<?php

namespace Src\Management\Login\Domain\Contracts;

use Src\Management\Login\Domain\ValueObjects\LoginJwt;
use Src\Management\Login\Domain\ValueObjects\LoginAuthParameters;

interface LoginAuthenticationContract
{
    public function auth(LoginAuthParameters $loginAuthParameters): string;

    public function check(LoginJwt $loginJwt): bool;

    public function get(LoginJwt $loginJwt): mixed;
}
