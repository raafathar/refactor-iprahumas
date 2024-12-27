<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegistrationApproved extends Notification
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
            ->line('Kami dengan senang hati menginformasikan bahwa pendaftaran Anda untuk menjadi anggota Ikatan Pranata Humas Indonesia (IPRAHUMAS) telah diterima.')
            ->line('Sebagai langkah pertama, kami telah melampirkan dokumen Surat Keputusan (SK) Pendaftaran pada email ini. Silakan cek kembali dokumen tersebut untuk informasi lebih lanjut.')
            ->line('Jika Anda memiliki pertanyaan, jangan ragu untuk menghubungi kami di [support@iprahumas.id](mailto:support@iprahumas.id).')
            ->subject('Pendaftaran Anggota Diterima')
            ->salutation('Salam hangat,  
            ' . config('app.name'))
            ->attach(storage_path('app/public/letter_of_acceptance/loa.pdf'), [
                'as' => 'Surat Keputusan Pendaftaran.pdf',
                'mime' => 'application/pdf',
            ]);
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