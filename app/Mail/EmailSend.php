<?php

namespace App\Mail;

use App\Models\Email;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailSend extends Mailable
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
        $sendEmail =  $this->markdown('email')
            ->from($this->email->sender)
            ->subject($this->email->subject)
            ->with(
                [
                    'text_content' => $this->email->text_content,
                    'html_content' => $this->email->html_content,
                ]
            );

        $attachments = $this->email->attachments()->get();
        \Log::debug('sdfsdfsdfsdfsdfsf');
        if (!empty($attachments)){
            foreach ($attachments as $attachment){
                $sendEmail->attach($attachment->path);
            }
        }


//
//        $fileSystem = new Filesystem();
//        $directory = public_path('uploads/'.$this->email->uniqueID);
//        if ($fileSystem->exists($directory)){
//            \Log::debug($directory.' exists');
//            $files = $fileSystem->files($directory);
//            \Log::debug(var_dump($files));
//            if (empty($files)){
//                $fileSystem->deleteDirectory($directory);
//                \Log::debug('Empty files');
//                return $sendEmail;
//            } else {
//                try {
//                    $sendEmail->attach($files);
//                } catch (Exception $e){
//                    \Log::alert($e->getMessage());
//                }
//
//            }
//        }

        return $sendEmail;
    }
}
