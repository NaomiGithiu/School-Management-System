namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewPasswordNotification extends Notification
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token; // Pass the token to the notification
    }

    public function via($notifiable)
    {
        return ['mail']; // Send notification via email
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Set Your Password')
            ->greeting('Hello '.$notifiable->name)
            ->line('You have been added to the system.')
            ->action('Set Password', url('/reset-password/'.$this->token))
            ->line('Thank you for using our application!');
    }
}
