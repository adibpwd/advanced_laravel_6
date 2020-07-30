<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Support\Str;



class PostNotif extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    private $post;

    public function __construct($table = 'kosong gan') 
    {
        $this->post = $table;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack', 'mail', 'database'];
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
                        'post' => true,
                        'title' => $this->post['post']['title'],
                        'content' => $this->post['post']['body'],
                        'create' => $this->post['post']['created_at'],
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
 
    public function toDatabase($notifiable)
    {
        return [
            'data' => $this->post['post'],
        ];
    }

    public function toArray($notifiable)
    {
        return [
        ];
    }

    public function toSlack($notifiable)
    {
        $message = "Post Baru \n judul = " . $this->post['post']['title']  . "\n content = " . Str::limit($this->post['post']['body'], 75, '...');
        
        return (new SlackMessage)
                ->from($this->post['post']['username'], ':ghost:')
                ->to('#testslackadib')
                ->content($message);
    }
}
