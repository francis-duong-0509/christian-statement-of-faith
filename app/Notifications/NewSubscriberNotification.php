<?php

namespace App\Notifications;

use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewSubscriberNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Subscriber $subscriber)
    {
        
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
        $locale = $this->subscriber->locale;
        $isVietnamese = $locale === 'vi';

        return (new MailMessage)
            ->subject($isVietnamese
                ? 'Người đăng ký mới: ' . $this->subscriber->email
                : 'New Subscriber: ' . $this->subscriber->email)
            ->greeting($isVietnamese ? 'Xin Chào!' : 'Hello!')
            ->line($isVietnamese
                ? 'Có người mới đăng ký nhận bản tin.'
                : 'A new subscriber has signed up for the newsletter.')
            ->line($isVietnamese ? '**Email:** ' : '**Email:** ')
            ->line($this->subscriber->email)
            ->line($isVietnamese ? '**Tên:** ' : '**Name:** ')
            ->line($this->subscriber->name ?? ($isVietnamese ? '(Không cung cấp)' : '(Not provided)'))
            ->line($isVietnamese ? '**Ngôn ngữ:** ' : '**Language:** ')
            ->line($isVietnamese ? 'Tiếng Việt' : 'English')
            ->line($isVietnamese ? '**IP:** ' : '**IP:** ')
            ->line($this->subscriber->ip_address ?? 'N/A')
            ->line($isVietnamese ? '**Thời gian:** ' : '**Time:** ')
            ->line($this->subscriber->created_at->format('Y-m-d H:i:s'))
            ->action(
                $isVietnamese ? 'Xem trong Admin' : 'View in Admin',
                url('/admin/subscribers/' . $this->subscriber->id . '/edit')
            )
            ->salutation($isVietnamese ? 'Hệ thống tự động' : 'System Notification');
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
