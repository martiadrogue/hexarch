<?php

namespace Src\Management\Login\Application\Auth;

use Illuminate\Support\Facades\Auth;
use Src\Management\Login\Domain\Contracts\LoginAuthenticationContract;
use Src\Management\Login\Domain\ValueObjects\LoginAuthParameters;

final class LoginAuthenticationUseCase
{

    private $loginAuthenticationContract;

    public function __construct(LoginAuthenticationContract $loginAuthenticationContract)
    {
        $this->loginAuthenticationContract = $loginAuthenticationContract;
    }

    public function __invoke(array $request)
    {
        return $this->loginAuthenticationContract->auth(new LoginAuthParameters($request));
    }

}
