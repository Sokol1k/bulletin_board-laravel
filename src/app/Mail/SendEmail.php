<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $confirmed;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($confirmed)
    {
        $this->confirmed = $confirmed;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->confirmed == 1) {
            return $this->markdown('emails.confirmed')
                ->with([
                    'url' => config('app.url'),
                ]);
        } else if($this->confirmed == 2) {
            return $this->markdown('emails.rejected');
        }
    }
}
