<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Messages\SlackMessage;


class CommentNotif extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    private $comment;

    public function __construct($table)
    {
        $this->comment = $table;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // dd($this->comment);
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->markdown('vendor.notifications.email', [
                        'comment' => true,
                        'content' => $this->comment['comment']['body'],
                        'title' => 'ada komen baru di ' . substr($this->comment['comment']['commentable_type'], 4) . 'kamu',
                        'create' => $this->comment['comment']['created_at'],
                        ]);
                    // ->line('The introduction to the notification.')
                    // ->action('Notification Action', url('/'))
                    // ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */

    
    public function toArray($notifiable)
    {

        return [
            'data' => $this->comment['comment'],
        ];
    }
}
