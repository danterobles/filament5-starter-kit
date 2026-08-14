<?php

namespace App\Notifications;

use App\Filament\Resources\Tasks\TaskResource;
use App\Models\Task;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Notifications\Notification as FilamentNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskAssignedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Task $task) {}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    /**
     * Get the database representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(User $notifiable): array
    {
        return FilamentNotification::make()
            ->title('Nueva tarea asignada')
            ->body("Se te asignó la tarea \"{$this->task->title}\" como recordatorio.")
            ->icon('heroicon-o-clipboard-document-list')
            ->actions([
                Action::make('view')
                    ->label('Ver tarea')
                    ->url(TaskResource::getUrl('edit', ['record' => $this->task]))
                    ->button()
                    ->markAsRead(),
            ])
            ->getDatabaseMessage();
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(User $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Nueva tarea asignada')
            ->greeting("Hola, {$notifiable->fullName}.")
            ->line("Se te asignó la tarea \"{$this->task->title}\" como recordatorio.")
            ->action('Ver tarea', TaskResource::getUrl('edit', ['record' => $this->task]))
            ->line('Si tienes alguna duda, contacta al equipo responsable de la tarea.');
    }
}
