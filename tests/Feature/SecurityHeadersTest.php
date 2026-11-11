<?php

test('responses carry the baseline security headers', function () {
    $response = $this->get(route('filament.admin.auth.login'));

    $response->assertOk()
        ->assertHeader('X-Frame-Options', 'SAMEORIGIN')
        ->assertHeader('X-Content-Type-Options', 'nosniff')
        ->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin')
        ->assertHeaderMissing('Strict-Transport-Security');
});

test('HSTS is sent only over HTTPS in production', function () {
    app()->detectEnvironment(fn (): string => 'production');
    $loginPath = route('filament.admin.auth.login', absolute: false);

    $this->get('http://localhost'.$loginPath)
        ->assertHeaderMissing('Strict-Transport-Security');

    $this->get('https://localhost'.$loginPath)
        ->assertHeader('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
});
