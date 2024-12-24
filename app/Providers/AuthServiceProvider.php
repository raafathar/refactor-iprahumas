<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function ($notifiable, $url) {

            return (new MailMessage)
                ->greeting('Halo ' . $notifiable->name . '!')
                ->subject('Verifikasi Alamat Email')
                ->line('Klik tombol di bawah ini untuk memverifikasi alamat email Anda.')
                ->action('Verifikasi Alamat Email', $url)
                ->line('Jika Anda memiliki pertanyaan, jangan ragu untuk menghubungi kami di [support@iprahumas.id](mailto:support@iprahumas.id).')
                ->line('')
                ->salutation('Salam hangat,  
            ' . config('app.name'));
        });
    }
}