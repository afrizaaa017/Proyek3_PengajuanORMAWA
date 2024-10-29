<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;

class PengajuanNotifikasi extends Notification
{
    use Queueable;

    private $pengajuanData;
    // private $details;

    /**
     * Create a new notification instance.
     */
    public function __construct($pengajuanData)
    {
        $this->pengajuanData = $pengajuanData;
        // $this->details = $details;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Pengajuan Baru Dikirim')
            ->line('Pengajuan baru telah dikirim oleh: ' . $this->pengajuanData['nama'])
            ->line('Periode: ' . $this->pengajuanData['periode'])
            ->action('Lihat Pengajuan', url('/pengajuanberkas'))
            ->line('Terima kasih telah menggunakan sistem pengajuan kami!');
        // ->greeting($this->details['greeting'])
        // ->line($this->details['body'])
        // ->action($this->details['actiontext'], $this->details['actionurl'])
        // ->line($this->details['lastline']);
    }

    public function toDatabase($notifiable)
    {
        return [
            'nama' => $this->pengajuanData['nama'],
            'periode' => $this->pengajuanData['periode'],
            'message' => 'Pengajuan Anda telah dikirim',
            'url' => url('/pengajuan/' . $this->pengajuanData['id']),
            'status' => 'pengajuan telah dikirim', // atau status lainnya sesuai logika
        ];
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
