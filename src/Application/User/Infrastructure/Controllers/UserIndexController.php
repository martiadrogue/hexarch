<?php

namespace Src\Application\User\Infrastructure\Controllers;

use Src\Application\User\Application\Get\UserIndexUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;

final class UserIndexController extends CustomController
{
    use HttpCodesHelper;

    private UserIndexUseCase $userIndexUseCase;

    public function __construct(UserIndexUseCase $userIndexUseCase)
    {
        $this->userIndexUseCase = $userIndexUseCase;
    }

    public function __invoke()
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->userIndexUseCase->__invoke()->entity(),
        );
    }
}
