<?php

namespace Src\Management\Login\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Management\Login\Application\Login\LoginAuthUseCase;
use Src\Shared\Infrastructure\Middleware\RoleMiddleware;

final class LoginAuthController extends CustomController
{

    use HttpCodesHelper;

    private $loginAuthUseCase;

    function __construct(LoginAuthUseCase $loginAuthUseCase)
    {
        $this->loginAuthUseCase = $loginAuthUseCase;

        $this->middleware(RoleMiddleware::class, [
            'roles' => '*',
        ]);
    }

    function __invoke(Request $request): JsonResponse
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->loginAuthUseCase->__invoke($request->toArray())->entity(),
        );
    }
}
