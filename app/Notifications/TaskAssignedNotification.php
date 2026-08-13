<?php

namespace App\Notifications;

use App\Filament\Resources\Tasks\TaskResource;
use App\Models\Task;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Notifications\Notification as FilamentNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
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
        return ['database'];
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
}
