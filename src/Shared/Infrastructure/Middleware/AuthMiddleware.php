<?php

namespace Src\Shared\Infrastructure\Middleware;

use Closure;
use Illuminate\Http\Request;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;
use Src\Shared\Infrastructure\Exceptions\AuthException;
use Src\Management\Login\Application\Auth\LoginCheckAuthenticationUseCase;

final class AuthMiddleware
{
    use HttpCodesHelper;

    private LoginCheckAuthenticationUseCase $loginCheckAuthenticationUseCase;

    public function __construct(LoginCheckAuthenticationUseCase $loginCheckAuthenticationUseCase) {
        $this->loginCheckAuthenticationUseCase = $loginCheckAuthenticationUseCase;
    }

    public function handle(Request $request, Closure $next): mixed
    {
        if (empty($request->header('authentication'))) {
            throw new AuthException('Not JWT auth', $this->badRequest());
        }

        // $check = $this->loginCheckAuthenticationUseCase->__invoke($request->header('authentication'));
        // if (!$check) {
        //     throw new AuthException('Invalid token or invalid user or expired token', $this->unauthorized());
        // }

        return $next($request);
    }

}
