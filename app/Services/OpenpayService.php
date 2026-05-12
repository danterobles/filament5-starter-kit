<?php

namespace App\Services;

use Openpay\Data\Openpay;
use Openpay\Data\OpenpayApiError;

class OpenpayService
{
    protected $openpay;

    public function __construct()
    {
        // Inicializar la instancia de Openpay con config
        Openpay::setId(config('services.openpay.merchant_id'));
        Openpay::setApiKey(config('services.openpay.private_key'));
        Openpay::setCountry(config('services.openpay.country')); // MX, CO, PE
        Openpay::setPublicIp(config('services.openpay.ip'));
        Openpay::setProductionMode(config('services.openpay.production'));

        $this->openpay = Openpay::getInstance(
            config('services.openpay.merchant_id'),
            config('services.openpay.private_key'),
            config('services.openpay.country'),
            config('services.openpay.ip')
        );
    }

    // ==========================================
    // GESTIÓN DE CLIENTES (CRUD)
    // ==========================================

    public function createCustomer(array $data): array
    {
        // $data debe contener: name, email, last_name, address (opcional), etc.
        $customer = $this->openpay->customers->add($data);

        // Si el objeto tiene método toArray()
        if (method_exists($customer, 'toArray')) {
            return $customer->toArray();
        }

        // Fallback: convertir manualmente
        return [
            'id' => $customer->id,
            'name' => $customer->name ?? null,
            'last_name' => $customer->last_name ?? null,
            'email' => $customer->email ?? null,
            'phone_number' => $customer->phone_number ?? null,
            'creation_date' => $customer->creation_date ?? null,
            'status' => $customer->status ?? null,
            'balance' => $customer->balance ?? null,
            'clabe' => $customer->clabe ?? null,
        ];
    }

    public function getCustomer(string $customerId)
    {
        return $this->openpay->customers->get($customerId);
    }

    public function updateCustomer(string $customerId, array $data)
    {
        $customer = $this->getCustomer($customerId);

        // Asignar nuevos valores
        foreach ($data as $key => $value) {
            $customer->$key = $value;
        }

        return $customer->save();
    }

    public function deleteCustomer(string $customerId)
    {
        $customer = $this->getCustomer($customerId);

        return $customer->delete();
    }

    // ==========================================
    // TARJETAS Y TOKENIZACIÓN
    // ==========================================

    /**
     * Asocia una tarjeta a un cliente existente.
     *
     * * @param string $customerId ID del cliente en Openpay
     * @param  string  $tokenId  El token (tok_...) generado por el Frontend (Recomendado)
     * @param  string  $deviceSessionId  ID de sesión del dispositivo (Anti-fraude)
     */
    public function addCardToCustomer(string $customerId, string $tokenId, string $deviceSessionId)
    {
        $customer = $this->getCustomer($customerId);

        $cardData = [
            'token_id' => $tokenId,
            'device_session_id' => $deviceSessionId,
        ];

        return $customer->cards->add($cardData);
    }

    /**
     * Eliminar una tarjeta de un cliente
     */
    public function deleteCard(string $customerId, string $cardId)
    {
        $customer = $this->getCustomer($customerId);
        $card = $customer->cards->get($cardId);

        return $card->delete();
    }

    // ==========================================
    // PLANES RECURRENTES (CRUD)
    // ==========================================

    public function createPlan(array $data)
    {
        // $data: amount, status, name, repeat_every, repeat_unit, etc.
        $plan = $this->openpay->plans->add($data);
        if (method_exists($plan, 'toArray')) {
            return $plan->toArray();
        }

        // Fallback: convertir manualmente
        return [
            'id' => $plan->id,
            'name' => $plan->name ?? null,
            'amount' => $plan->amount ?? null,
            'status' => $plan->status ?? null,
            'repeat_every' => $plan->repeat_every ?? null,
            'repeat_unit' => $plan->repeat_unit ?? null,
            'creation_date' => $plan->creation_date ?? null,
            'retry_times' => $plan->retry_times ?? null,
            'trial_days' => $plan->trial_days ?? null,
            'status_after_retry' => $plan->status_after_retry ?? null,
        ];
    }

    public function getPlan(string $planId)
    {
        return $this->openpay->plans->get($planId);
    }

    public function updatePlan(string $planId, array $data)
    {
        // Nota: Openpay limita qué campos se pueden editar en un plan activo.
        // Generalmente solo el nombre y el trial_days.
        $plan = $this->getPlan($planId);

        foreach ($data as $key => $value) {
            $plan->$key = $value;
        }

        return $plan->save();
    }

    public function deletePlan(string $planId)
    {
        $plan = $this->getPlan($planId);

        return $plan->delete();
    }

    // ==========================================
    // SUSCRIPCIONES
    // ==========================================

    /**
     * Crear una suscripción para un cliente
     */
    public function createSubscription(string $customerId, string $planId, ?string $cardId = null): array
    {
        $customer = $this->getCustomer($customerId);

        $subscriptionData = [
            'plan_id' => $planId,
        ];

        // Si se especifica una tarjeta específica (si no, usa la default del cliente)
        if ($cardId) {
            $subscriptionData['source_id'] = $cardId;
        }

        $subscription = $customer->subscriptions->add($subscriptionData);

        // Si el objeto tiene método toArray()
        if (method_exists($subscription, 'toArray')) {
            return $subscription->toArray();
        }

        // Fallback: convertir manualmente
        return [
            'id' => $subscription->id ?? null,
            'card' => isset($subscription->card) ? [
                'id' => $subscription->card->id ?? null,
                'type' => $subscription->card->type ?? null,
                'brand' => $subscription->card->brand ?? null,
                'address' => $subscription->card->address ?? null,
                'card_number' => $subscription->card->card_number ?? null,
                'holder_name' => $subscription->card->holder_name ?? null,
                'expiration_year' => $subscription->card->expiration_year ?? null,
                'expiration_month' => $subscription->card->expiration_month ?? null,
                'allows_charges' => $subscription->card->allows_charges ?? null,
                'allows_payouts' => $subscription->card->allows_payouts ?? null,
                'creation_date' => $subscription->card->creation_date ?? null,
                'bank_name' => $subscription->card->bank_name ?? null,
                'card_business_type' => $subscription->card->card_business_type ?? null,
                'dcc' => $subscription->card->dcc ?? null,
                'bank_code' => $subscription->card->bank_code ?? null,
                'customer_id' => $subscription->card->customer_id ?? null,
            ] : null,
            'cancel_at_period_end' => $subscription->cancel_at_period_end ?? null,
            'charge_date' => $subscription->charge_date ?? null,
            'creation_date' => $subscription->creation_date ?? null,
            'current_period_number' => $subscription->current_period_number ?? null,
            'period_end_date' => $subscription->period_end_date ?? null,
            'status' => $subscription->status ?? null,
            'trial_end_date' => $subscription->trial_end_date ?? null,
            'default_charge_quantity' => $subscription->default_charge_quantity ?? null,
            'plan_id' => $subscription->plan_id ?? null,
            'customer_id' => $subscription->customer_id ?? null,
        ];
    }

    public function getSubscription(string $customerId, string $subscriptionId)
    {
        $customer = $this->getCustomer($customerId);

        return $customer->subscriptions->get($subscriptionId);
    }

    /**
     * Cancelar suscripción
     */
    public function cancelSubscription(string $customerId, string $subscriptionId)
    {
        $customer = $this->getCustomer($customerId);
        $subscription = $customer->subscriptions->get($subscriptionId);

        return $subscription->delete();
    }

    // ==========================================
    // CARGOS (PAGOS DE RESERVAS)
    // ==========================================

    /**
     * Cobrar a un cliente usando un token de tarjeta (nuevo o guardado).
     *
     * @param  string  $customerId  ID del cliente en Openpay
     * @param  string  $sourceId  Token (tok_...) o ID de tarjeta guardada
     * @param  float  $amount  Monto en MXN
     * @param  string  $description  Descripción del cargo
     * @param  string  $deviceSessionId  ID de sesión del dispositivo (anti-fraude)
     * @param  string  $orderId  ID único del pedido (ej. "reserva-5-pago-1")
     */
    public function chargeCustomerSource(
        string $customerId,
        string $sourceId,
        float $amount,
        string $description,
        string $deviceSessionId,
        string $orderId
    ): array {
        $customer = $this->getCustomer($customerId);

        $chargeData = [
            'method' => 'card',
            'source_id' => $sourceId,
            'amount' => $amount,
            'currency' => 'MXN',
            'description' => $description,
            'device_session_id' => $deviceSessionId,
            'order_id' => $orderId,
        ];

        $charge = $customer->charges->create($chargeData);

        return [
            'id' => $charge->id ?? null,
            'status' => $charge->status ?? null,
            'amount' => $charge->amount ?? null,
            'description' => $charge->description ?? null,
            'order_id' => $charge->order_id ?? null,
            'transaction_type' => $charge->transaction_type ?? null,
            'creation_date' => $charge->creation_date ?? null,
            'card' => isset($charge->card) ? [
                'id' => $charge->card->id ?? null,
                'type' => $charge->card->type ?? null,
                'brand' => $charge->card->brand ?? null,
                'card_number' => $charge->card->card_number ?? null,
                'holder_name' => $charge->card->holder_name ?? null,
                'expiration_year' => $charge->card->expiration_year ?? null,
                'expiration_month' => $charge->card->expiration_month ?? null,
                'allows_charges' => $charge->card->allows_charges ?? true,
                'allows_payouts' => $charge->card->allows_payouts ?? false,
                'bank_name' => $charge->card->bank_name ?? null,
                'bank_code' => $charge->card->bank_code ?? null,
                'creation_date' => $charge->card->creation_date ?? null,
            ] : null,
        ];
    }

    /**
     * Crear o asegurar que el cliente exista en Openpay.
     */
    public function ensureCustomer(string $name, string $lastName, string $email, string $phone = ''): array
    {
        $customerData = [
            'name' => $name,
            'last_name' => $lastName,
            'email' => $email,
        ];

        if ($phone) {
            $customerData['phone_number'] = $phone;
        }

        return $this->createCustomer($customerData);
    }

    // ==========================================
    // MANEJO DE ERRORES
    // ==========================================

    /**
     * Traduce una excepción de Openpay a un mensaje de error en español orientado al usuario.
     * Si la excepción no es de Openpay, devuelve un mensaje genérico.
     */
    public static function resolveErrorMessage(\Throwable $e): string
    {
        if ($e instanceof OpenpayApiError) {
            $code = (int) $e->getErrorCode();

            return self::ERROR_MESSAGES[$code] ?? 'Error al procesar el pago. Intenta nuevamente.';
        }

        return 'Error inesperado al procesar el pago. Intenta nuevamente.';
    }

    /** @var array<int, string> */
    private const ERROR_MESSAGES = [
        // Errores generales
        1000 => 'Error interno en el servidor de pagos. Intenta nuevamente más tarde.',
        1001 => 'Solicitud con formato inválido. Contacta al soporte.',
        1002 => 'Credenciales de autenticación incorrectas.',
        1003 => 'Parámetros incorrectos en la solicitud.',
        1004 => 'Servicio no disponible temporalmente. Intenta más tarde.',
        1005 => 'El recurso solicitado no existe.',
        1006 => 'Ya existe una transacción con este identificador.',
        1007 => 'La transferencia de fondos fue rechazada.',
        1008 => 'Una de las cuentas requeridas está desactivada.',
        1009 => 'La solicitud excede el tamaño permitido.',
        1010 => 'Tipo de llave de API incorrecto.',
        1011 => 'El recurso fue eliminado previamente.',
        1012 => 'El monto de la transacción está fuera del rango permitido.',
        1013 => 'Operación no permitida para este recurso.',
        1014 => 'La cuenta está inactiva.',
        1015 => 'Sin respuesta del servidor de pagos. Intenta nuevamente.',
        1016 => 'El correo del comercio ya fue procesado.',
        1017 => 'Pasarela de pago temporalmente no disponible. Intenta más tarde.',
        1018 => 'Se excedió el número máximo de intentos de cobro.',
        1020 => 'Número de decimales inválido para esta divisa.',
        // Errores de almacenamiento
        2001 => 'La cuenta CLABE ya está registrada.',
        2002 => 'El número de tarjeta ya está registrado.',
        2003 => 'Ya existe un cliente con este identificador.',
        2004 => 'El número de tarjeta no es válido.',
        2005 => 'La tarjeta está vencida.',
        2006 => 'El código de seguridad (CVV) es requerido.',
        2007 => 'Esta tarjeta de prueba solo es válida en ambiente Sandbox.',
        2008 => 'La tarjeta no es elegible para puntos Santander.',
        2009 => 'El código de seguridad (CVV) es inválido.',
        2010 => 'Autenticación 3D Secure fallida. Verifica con tu banco.',
        2011 => 'Tipo de tarjeta no soportado.',
        // Errores de tarjeta
        3001 => 'Tarjeta declinada. Verifica los datos o utiliza otra tarjeta.',
        3002 => 'La tarjeta está vencida. Utiliza una tarjeta vigente.',
        3003 => 'Fondos insuficientes en la tarjeta.',
        3004 => 'La tarjeta fue reportada como robada. Contacta a tu banco.',
        3005 => 'Tarjeta rechazada por el sistema antifraude.',
        3006 => 'Operación no permitida para este cliente o transacción.',
        3007 => 'Tarjeta declinada. Contacta a tu banco.',
        3008 => 'La tarjeta no está habilitada para transacciones en línea.',
        3009 => 'La tarjeta fue reportada como perdida. Contacta a tu banco.',
        3010 => 'El banco ha restringido el uso de esta tarjeta.',
        3011 => 'El banco ha solicitado retener la tarjeta. Contacta a tu banco.',
        3012 => 'Se requiere autorización del banco para procesar el pago.',
        // Errores de cuenta
        4001 => 'Saldo insuficiente en la cuenta del comercio.',
        4002 => 'Hay comisiones pendientes de pago en la cuenta del comercio.',
        // Errores de orden
        5001 => 'Ya existe una orden con este identificador.',
        // Errores de webhook
        6001 => 'El webhook ya fue procesado.',
        6002 => 'Fallo al conectar con el servicio de webhook.',
        6003 => 'El servicio de webhook respondió con un error.',
    ];

    /**
     * Reembolsar un cargo existente (total o parcial).
     *
     * @param  string  $customerId  ID del cliente en Openpay
     * @param  string  $chargeId  ID del cargo a reembolsar
     * @param  float  $amount  Monto a reembolsar (null = reembolso total)
     * @param  string  $description  Descripción del reembolso
     */
    public function refundCharge(
        string $customerId,
        string $chargeId,
        float $amount,
        string $description = 'Reembolso'
    ): array {
        $customer = $this->getCustomer($customerId);
        $charge = $customer->charges->get($chargeId);

        $refundData = [
            'description' => $description,
            'amount' => $amount,
        ];

        $charge->refund($refundData);

        return [
            'id' => $charge->id ?? null,
            'status' => $charge->status ?? null,
            'refund' => $charge->refund ?? null,
        ];
    }
}

