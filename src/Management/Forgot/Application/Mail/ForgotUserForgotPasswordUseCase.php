<?php

namespace Src\Management\Forgot\Application\Mail;

use Src\Management\Forgot\Domain\Forgot;
use Src\Management\Forgot\Domain\ValueObjects\ForgotMailable;
use Src\Management\Forgot\Domain\Contracts\ForgotMailableContract;

final class ForgotUserForgotPasswordUseCase
{
    private ForgotMailableContract $forgotMailableContract;

    public function __construct(ForgotMailableContract $forgotMailableContract)
    {
        $this->forgotMailableContract = $forgotMailableContract;
    }

    public function __invoke(array $request): Forgot
    {
        return $this->forgotMailableContract->forgotSendMail(new ForgotMailable($request['email']));
    }
}
