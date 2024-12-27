<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Stevebauman\Location\Facades\Location;

class LoginNotification extends Notification
{
    use Queueable;

    protected $deviceName;
    protected $ipAddress;
    protected $user;

    /**
     * Create a new notification instance.
     */
    public function __construct($request, $user)
    {
        $this->deviceName =
            $request->header('User-Agent');
        $this->ipAddress = $request->ip();
        $this->user = $user;
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
            ->greeting('Halo ' . $this->user->name . '!')
            ->line('')
            ->subject('Login Notification')
            ->line('Anda telah berhasil masuk ke akun Anda.')
            ->line('Kapan dan di mana ini terjadi?')
            ->line('Tanggal: ' . now()->setTimezone('Asia/Jakarta')->toDateTimeString() . ' WIB')
            ->line('Browser: ' . $this->getBrowser())
            ->line('Sistem Operasi: ' . $this->getOperatingSystem())
            ->line('Lokasi Perkiraan: ' . $this->getLocationFromIp($this->ipAddress))
            ->line('Tidak melakukan ini? Pastikan untuk segera mengganti kata sandi Anda.')
            ->action('Reset Kata Sandi', url('/forgot-password'))
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
            'device_name' => $this->deviceName,
            'ip_address' => $this->ipAddress,
        ];
    }

    private function getLocationFromIp($ipAddress)
    {
        $location = Location::get($ipAddress);

        if ($location && $location->cityName && $location->regionName && $location->countryName) {
            return $location->cityName . ', ' . $location->regionName . ', ' . $location->countryName;
        }

        return 'Location not found';
    }

    private function getBrowser()
    {
        $userAgent = $this->deviceName;

        // Check for common browsers using regex
        if (preg_match('/Chrome/i', $userAgent)) {
            return 'Chrome';
        } elseif (preg_match('/Firefox/i', $userAgent)) {
            return 'Firefox';
        } elseif (preg_match('/Safari/i', $userAgent) && !preg_match('/Chrome/i', $userAgent)) {
            return 'Safari';
        } elseif (preg_match('/Edge/i', $userAgent)) {
            return 'Microsoft Edge';
        } elseif (preg_match('/Trident/i', $userAgent)) {
            return 'Internet Explorer';
        } elseif (preg_match('/Opera/i', $userAgent)) {
            return 'Opera';
        }

        return 'Unknown Browser';
    }

    private function getOperatingSystem()
    {
        $userAgent = $this->deviceName;

        // Match common OS patterns from the user-agent string
        if (preg_match('/Macintosh|Mac OS X/i', $userAgent)) {
            return 'Mac OS X';
        } elseif (preg_match('/Windows/i', $userAgent)) {
            return 'Windows';
        } elseif (preg_match('/Linux/i', $userAgent)) {
            return 'Linux';
        } elseif (preg_match('/Android/i', $userAgent)) {
            return 'Android';
        } elseif (preg_match('/iPhone|iPad/i', $userAgent)) {
            return 'iOS';
        }

        return 'Unknown OS';
    }
}