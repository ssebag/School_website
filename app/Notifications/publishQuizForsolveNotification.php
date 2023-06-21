<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class publishQuizForsolveNotification extends Notification
{
    use Queueable;
    private $quiz_id;
    private $teacher;
    private $subject;
    private $date;
    private $message;
    private $wishes;

 /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($quiz_id,$teacher,$subject,$date)
    {
        $this->quiz_id= $quiz_id;
        $this->teacher= $teacher;
        $this->subject= $subject;
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
            'teacher'=>$this->teacher,
            'subject'=>$this->subject,
            'date'=>'',
            'message'=>'The quiz is ready for',
            'wishes'=>'Press to solve it',
        ];
    }
}
