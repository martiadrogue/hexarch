<?php

namespace Src\Management\Forgot\Domain\Contracts;

use Src\Management\Forgot\Domain\ValueObjects\ForgotMailable;
use Src\Management\Forgot\Domain\Forgot;

interface ForgotMailableContract
{
    public function forgotSendMail(ForgotMailable $forgotMailable): Forgot;
}
