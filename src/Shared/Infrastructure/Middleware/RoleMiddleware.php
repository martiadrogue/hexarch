<?php

namespace Src\Shared\Infrastructure\Middleware;

use Closure;
use Illuminate\Http\Request;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;
use Src\Shared\Infrastructure\Exceptions\AuthException;
use Src\Management\Login\Application\Auth\LoginRoleAuthenticationUseCase;
use Src\Management\Login\Application\Auth\LoginCheckAuthenticationUseCase;

final class RoleMiddleware
{
    use HttpCodesHelper;

    private LoginRoleAuthenticationUseCase $loginRoleAuthenticationUseCase;

    public function __construct(LoginRoleAuthenticationUseCase $loginRoleAuthenticationUseCase) {
        $this->loginRoleAuthenticationUseCase = $loginRoleAuthenticationUseCase;
    }


    public function handle(Request $request, Closure $next): mixed
    {
        if (empty($request->header('authentication'))) {
            throw new AuthException('Not JWT auth', $this->badRequest());
        }

        $check = $this->loginRoleAuthenticationUseCase->__invoke(
            $request->header('authentication'),
            $request->route()->controller->getMiddleware()[0]['options']['roles'] ?? '*',
        );

        if (!$check) {
            throw new AuthException('Role is not valid', $this->unauthorized());
        }

        return $next($request);
    }

}
