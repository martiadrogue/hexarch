<?php

namespace Src\Management\Login\Application\Auth;

use Src\Management\Login\Domain\Contracts\LoginAuthenticationContract;
use Src\Management\Login\Domain\Login;
use Src\Management\Login\Domain\ValueObjects\LoginJwt;

final class LoginRoleAuthenticationUseCase
{
    private $loginAuthenticationContract;

    public function __construct(LoginAuthenticationContract $loginAuthenticationContract)
    {
        $this->loginAuthenticationContract = $loginAuthenticationContract;
    }

    public function __invoke(string $jwt, string|array $typeRoles): bool
    {
        $login = new Login([
            'user' => $this->loginAuthenticationContract->get(new LoginJwt($jwt)),
            'type_roles' => $typeRoles,
        ]);

        return $login->getCheckRole();
    }
}
