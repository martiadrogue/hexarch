<?php

namespace Src\Shared\Infrastructure\Middleware;

use Closure;
use Illuminate\Http\Request;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;
use Src\Shared\Infrastructure\Exceptions\ApiException;
use Src\Shared\Infrastructure\Exceptions\ApiAuthException;

final class ApiMiddleware
{
    use HttpCodesHelper;

    public function handle(Request $request, Closure $next): mixed
    {
        if (empty($request->header('authorization'))) {
            throw new ApiAuthException('Auth authorization is empty', $this->badRequest());
        }

        if (env('API_KEY') !== $request->header('authorization')) {
            throw new ApiException('Auth authorization is failed', $this->unauthorized());
        }

        return $next($request);
    }
}
