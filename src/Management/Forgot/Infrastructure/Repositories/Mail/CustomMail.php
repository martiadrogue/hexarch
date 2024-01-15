<?php

namespace Src\Management\Forgot\Infrastructure\Repositories\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

final class CustomMail extends Mailable
{
    use Queueable, SerializesModels;

    public $demo;

    public function __construct($demo)
    {
        $this->demo = $demo;
    }

    public function build(): mixed
    {
        return $this->from($this->demo->from)
            ->subject($this->demo->subject)
            ->markdown($this->demo->markdown);
    }
}
