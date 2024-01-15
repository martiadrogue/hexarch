<?php

namespace Src\Application\User\Infrastructure\Controllers;

use Src\Shared\Infrastructure\Helper\HttpCodesHelper;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Application\User\Application\Destroy\UserDestroyUseCase;

final class UserDestroyController extends CustomController
{
    use HttpCodesHelper;

    private UserDestroyUseCase $userDestroyUseCase;

    public function __construct(UserDestroyUseCase $userDestroyUseCase)
    {
        $this->userDestroyUseCase = $userDestroyUseCase;
    }

    public function __invoke(int $id)
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->userDestroyUseCase->__invoke($id)->entity(),
        );
    }
}
