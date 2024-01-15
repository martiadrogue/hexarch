<?php

namespace Src\Management\Login\Domain\ValueObjects;

use Src\Shared\Domain\ValueObjets\StringValueObjet;

final class LoginJwt extends StringValueObjet
{

    public function jwtKey(): string
    {
        return env('JWT_KEY');
    }

    public function jwtEncrypt(): string
    {
        return env('JWT_ENCRYPT');
    }

}
