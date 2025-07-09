<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TugasDeadlineNotification extends Notification
{
    use Queueable;

    protected string $judul;
    protected string $pesan;

    public function __construct(string $judul, string $pesan)
    {
        $this->judul = $judul;
        $this->pesan = $pesan;
    }

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        return [
            'title' => $this->judul,
            'body' => $this->pesan,
        ];
    }

    // Optional: fallback jika dibutuhkan oleh toArray() atau API
    public function toArray($notifiable): array
    {
        return [
            'title' => $this->judul,
            'body' => $this->pesan,
        ];
    }
}
