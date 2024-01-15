<?php

namespace Src\Management\Login\Application\Auth;

use Illuminate\Support\Facades\Auth;
use Src\Management\Login\Domain\Contracts\LoginAuthenticationContract;
use Src\Management\Login\Domain\ValueObjects\LoginAuthParameters;
use Src\Management\Login\Domain\ValueObjects\LoginJwt;

final class LoginCheckAuthenticationUseCase
{
    private $loginAuthenticationContract;

    public function __construct(LoginAuthenticationContract $loginAuthenticationContract)
    {
        $this->loginAuthenticationContract = $loginAuthenticationContract;
    }

    public function __invoke(string $jwt)
    {
        return $this->loginAuthenticationContract->check(new LoginJwt($jwt));
    }
}
