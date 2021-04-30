<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMessage extends Notification
{
    use Queueable;

    public $expenditure;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($expenditure)
    {
        $this->expenditure = $expenditure;
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail']; //Hangi yontem olacagi,'slack olsaydi public function toSlack fonk olmaliydi'
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
                    ->line('Harcama Bilgileri')
                    ->line('Toplam Tutar:' .$this->expenditure->total)
                    ->line('Kategori:' .$this->expenditure->category_id)
                    ->line('Harcama Yeri:' .$this->expenditure->location)
                    ->line('Harcama Tarihi:'  .$this->expenditure->date)
                    ->action('Harcama Takibi', url('/')); //harekete gecirici 
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
