<?php

namespace Src\Application\User\Application\Update;

use Src\Application\User\Domain\ValueObjects\UserId;
use Src\Application\User\Domain\ValueObjects\UserUpdate;
use Src\Application\User\Domain\Contracts\UserRepositoryContract;
use Src\Application\User\Domain\User;

final class UserUpdateUseCase
{
    private UserRepositoryContract $userRepositoryContract;

    public function __construct(UserRepositoryContract $userRepositoryContract)
    {
        $this->userRepositoryContract = $userRepositoryContract;
    }

    public function __invoke(array $request, int $id): User
    {
        return $this->userRepositoryContract->update(new UserUpdate($request), new UserId($id));
    }
}
