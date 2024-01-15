<?php

namespace Src\Application\User\Application\Get;

use Src\Application\User\Domain\Contracts\UserRepositoryContract;

final class UserIndexUseCase
{
    private UserRepositoryContract $userRepositoryContract;

    public function __construct(UserRepositoryContract $userRepositoryContract)
    {
        $this->userRepositoryContract = $userRepositoryContract;
    }

    public function __invoke()
    {
        return $this->userRepositoryContract->index();
    }
}
