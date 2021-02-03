<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminCreated extends Notification
{
    use Queueable;

    /**
     * The password reset token.
     *
     * @var string
     */
    public $email;
    public $name;
    public $password;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($email, $name,$password)
    {
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
                    ->line('لقد تم تسجيلكم في الموقع يمكنك استعمال هذه البيانات لتسجيل الدخول')
                    ->line('اسم المستخدم ' . $this->name . ',')
                    ->line('كلمة المرور ' . $this->password . ',')
                    ->line('البريد الالكتروني ' . $this->email . ',')
                    ->action('تسجيل الدخول', url('saveme.test/admin'))
                    ->line('شكرا لك');
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
            //
        ];
    }
}
