<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AccountDetail extends Notification
{
    use Queueable;

    protected $request;
    protected $password;

    /**
     * Create a new notification instance.
     */
    public function __construct($request, $password)
    {
        $this->request = $request;
        $this->password = $password;
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
            ->greeting('Halo ' . $this->request->name . '!')
            ->line('')
            ->subject('Detail Akun Anda')
            ->line('Berikut adalah detail akun Anda yang telah berhasil dibuat:')
            ->line('**Email:** ' . $this->request->email)
            ->line('**Password:** ' . $this->password)
            ->line('Silakan login untuk melanjutkan proses pendaftaran Anda.')
            ->action('Login Sekarang', url('/login'))
            ->line('Jika Anda memiliki pertanyaan, jangan ragu untuk menghubungi kami di [support@iprahumas.id](mailto:support@iprahumas.id).')
            ->line('')
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