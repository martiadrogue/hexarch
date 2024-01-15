<?php

namespace Src\Management\Login\Domain\ValueObjects;

use Src\Shared\Domain\ValueObjets\MixedValueObjet;

final class LoginAuthentication extends MixedValueObjet
{
    public function checkPassword(string $passwordRequest, string $password): bool
    {
        return password_verify($passwordRequest, $password);
    }
}
