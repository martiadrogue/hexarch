<?php

namespace Src\Management\Login\Application\Login;

use Src\Management\Login\Domain\ValueObjects\LoginAuthentication;
use Src\Management\Login\Domain\Contracts\LoginRepositoryContract;
use Src\Management\Login\Application\Auth\LoginAuthenticationUseCase;
use Src\Management\Login\Domain\Login;

final class LoginAuthUseCase
{
    private LoginRepositoryContract $loginRepositoryContract;
    private LoginAuthenticationUseCase $loginAuthenticationUseCase;

    public function __construct(LoginRepositoryContract $loginRepositoryContract, LoginAuthenticationUseCase $loginAuthenticationUseCase)
    {
        $this->loginRepositoryContract = $loginRepositoryContract;
        $this->loginAuthenticationUseCase = $loginAuthenticationUseCase;
    }
    function __invoke(array $request): Login
    {
        $login = $this->loginRepositoryContract->login(new LoginAuthentication($request));
        $jwt = $this->loginAuthenticationUseCase->__invoke($login->handler());

        return new Login(array_merge($login->handler(), [
            'jwt' => $this->loginAuthenticationUseCase->__invoke($login->handler()),
        ]));

    }
}
