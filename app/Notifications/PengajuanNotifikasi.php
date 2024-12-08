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
    public $pengajuan;

    /**
     * Create a new notification instance.
     */
    public function __construct($pengajuan)
    {
        $this->pengajuan = $pengajuan;
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
            ->line('Pengajuan baru telah dikirim oleh: ' . $this->pengajuan['nama'])
            ->line('ORMAWA: ' . $this->pengajuan['ketua_ormawa'])
            ->line('Periode: ' . $this->pengajuan['periode'])
            // ->action('Lihat Pengajuan', url('/pengajuanberkas'))
            ->line('Terima kasih telah menggunakan sistem pengajuan kami!');
    }

    // public function toDatabase($notifiable)
    // {
    //     return [
    //         'nama' => $this->pengajuan['nama'],
    //         'ketua_ormaw' => $this->pengajuan['ketua_ormawa'],
    //         'periode' => $this->pengajuan['periode'],
    //         'message' => 'Pengajuan Anda telah dikirim',
    //         // 'url' => url('/pengajuan/' . $this->pengajuan['id']),
    //         'status' => 'pengajuan telah dikirim',
    //     ];
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'pengajuan' => $this->pengajuan,
            'message' => 'Pengajuan baru telah disimpan.'
        ];
    }
}
