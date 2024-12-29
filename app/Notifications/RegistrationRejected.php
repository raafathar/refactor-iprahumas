<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegistrationRejected extends Notification
{
    use Queueable;

    protected $request;
    protected $registration;

    /**
     * Create a new notification instance.
     */
    public function __construct($request, $registration)
    {
        $this->request = $request;
        $this->registration = $registration;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Halo ' . $this->registration->name . '!')
            ->line('Terima kasih atas minat dan antusiasme Anda untuk bergabung dengan Ikatan Pranata Humas Indonesia (IPRAHUMAS).')
            ->line('Namun, dengan berat hati, kami harus memberitahukan bahwa pendaftaran Anda belum dapat kami terima karena alasan berikut:')
            ->line('"' . $this->request->reason . '"')
            ->line('Jika Anda memiliki pertanyaan, jangan ragu untuk menghubungi kami di [support@iprahumas.id](mailto:support@iprahumas.id).')
            ->subject('Pendaftaran Anggota Ditolak')
            ->salutation('Salam hangat,  
            ' . config('app.name'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}