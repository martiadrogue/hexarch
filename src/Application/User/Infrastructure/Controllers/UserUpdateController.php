<?php

namespace Src\Application\User\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Application\User\Application\Update\UserUpdateUseCase;
use Src\Application\User\Infrastructure\Request\UserUpdateRequest;

final class UserUpdateController extends CustomController
{
    use HttpCodesHelper;

    private UserUpdateUseCase $userUpdateUseCase;

    public function __construct(UserUpdateUseCase $userUpdateUseCase)
    {
        $this->userUpdateUseCase = $userUpdateUseCase;
    }

    public function __invoke(UserUpdateRequest $request, int $id): JsonResponse
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->userUpdateUseCase->__invoke($request->toArray(), $id)->entity(),
        );
    }
}
