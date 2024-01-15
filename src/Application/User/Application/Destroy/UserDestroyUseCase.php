<?php

namespace Src\Application\User\Application\Destroy;

use App\Models\User;
use Src\Application\User\Domain\Contracts\UserRepositoryContract;
use Src\Application\User\Domain\ValueObjects\UserId;

final class UserDestroyUseCase
{
    private UserRepositoryContract $userRepositoryContract;

    public function __construct(UserRepositoryContract $userRepositoryContract)
    {
        $this->userRepositoryContract = $userRepositoryContract;
    }

    public function __invoke(int $id): User
    {
        return $this->userRepositoryContract->destroy(new UserId($id));
    }
}
