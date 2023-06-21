<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LinkQuizNotification extends Notification
{
    use Queueable;
    private $quiz_id;
    private $message;
    private $date;
    private $t1Class;
    private $t1Subject;
    private $wishes;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($quiz_id,$t1Class,$t1Subject,$date)
    {
        $this->quiz_id= $quiz_id;
        $this->t1Class= $t1Class;
        $this->t1Subject= $t1Subject;
       $this->date= $date;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            'quiz_id'=>$this->quiz_id,
            'message'=>'Your request is approve',
            't1Class'=>$this->t1Class,
            't1Subject'=>$this->t1Subject,
             'date'=>$this->date,
             'wishes'=>''
        ];
    }
}
