<?php

namespace Src\Application\User\Infrastructure\Controllers;

use Src\Shared\Infrastructure\Helper\HttpCodesHelper;
use Src\Application\User\Application\Get\UserShowUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;

final class UserShowController extends CustomController
{
    use HttpCodesHelper;

    private UserShowUseCase $userIndexUseCase;

    public function __construct(UserShowUseCase $userIndexUseCase)
    {
        $this->userIndexUseCase = $userIndexUseCase;
    }

    public function __invoke(int $id)
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->userIndexUseCase->__invoke($id)->entity(),
        );
    }
}
