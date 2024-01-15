<?php

namespace Src\Application\User\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;
use Src\Shared\Infrastructure\Middleware\RoleMiddleware;
use Src\Application\User\Application\Get\UserShowUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Application\User\Application\Store\UserStoreUseCase;
use Src\Application\User\Infrastructure\Request\UserStoreRequest;

final class UserStoreController extends CustomController
{
    use HttpCodesHelper;

    private UserStoreUseCase $userStoreUseCase;

    public function __construct(UserStoreUseCase $userStoreUseCase)
    {
        $this->userStoreUseCase = $userStoreUseCase;
        $this->middleware(RoleMiddleware::class, [
            'role' => 'super_admin',
        ]);
    }

    public function __invoke(UserStoreRequest $request)
    {
        return $this->jsonResponse(
            $this->created(),
            false,
            $this->userStoreUseCase->__invoke($request->toArray())->entity(),
        );
    }
}
