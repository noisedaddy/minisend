<?php

namespace App\Mail;

use App\Models\Email;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $email;
    public $subject = 'test subject';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Email $email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email')
            ->from($this->email->sender)
            ->subject($this->email->subject)
            ->with(
                [
                    'text_content' => $this->email->text_content,
                    'html_content' => $this->email->html_content,
                    ]
            );
    }
}
