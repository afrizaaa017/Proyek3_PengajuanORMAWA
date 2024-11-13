<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Notifs extends Notification
{
    use Queueable;
    public $data;

    /**
     * Create a new notification instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
        //
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
            ->line('Pengajuan baru telah dikirim oleh: ' . $this->data['nama'])
            ->line('Periode: ' . $this->data['periode'])
            ->action('Lihat Pengajuan', url('/pengajuanberkas'))
            ->line('Terima kasih telah menggunakan sistem pengajuan kami!');
        // ->greeting($this->details['greeting'])
        // ->line($this->details['body'])
        // ->action($this->details['actiontext'], $this->details['actionurl'])
        // ->line($this->details['lastline']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        // return [
        //     'nama' => $this->data['nama'],
        //     'periode' => $this->data['periode'],
        //     'message' => 'Pengajuan Anda telah dikirim',
        //     'url' => url('/pengajuan/' . $this->data['id']),
        //     'status' => 'pengajuan telah dikirim',
        // ];

        return [
            'data' => $this->data,
            'message' => 'Pengajuan baru telah disimpan.'
        ];
    }
}
