<?php

namespace Src\Management\Forgot\Infrastructure\Repositories\Mail;

use Exception;
use Src\Management\Forgot\Domain\Forgot;
use Src\Management\Forgot\Domain\ValueObjects\ForgotMailable;
use Src\Management\Forgot\Domain\Contracts\ForgotMailableContract;
use Illuminate\Support\Facades\Mail;

final class ForgotMailableRepository implements ForgotMailableContract
{
    private Mail $mail;
    public function __construct()
    {
        $this->mail = new Mail();
    }

    public function forgotSendMail(ForgotMailable $forgotMailable): Forgot
    {
        $response = $this->mail::to($forgotMailable->value())
        ->send(new CustomMail($forgotMailable->getObject()));

        if (!$response) {
            new Forgot(null, 'MAIL_FAILED');
        }

        return new Forgot([
            'email' => $forgotMailable->value(),
            'message' => 'Message sent',
        ]);
    }
}
