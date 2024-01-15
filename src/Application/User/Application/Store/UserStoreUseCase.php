<?php

namespace Src\Application\User\Application\Store;

use Src\Application\User\Domain\Contracts\UserRepositoryContract;
use Src\Application\User\Domain\ValueObjects\UserStore;

final class UserStoreUseCase
{
    private UserRepositoryContract $userRepositoryContract;

    public function __construct(UserRepositoryContract $userRepositoryContract)
    {
        $this->userRepositoryContract = $userRepositoryContract;
    }

    public function __invoke(array $request)
    {
        return $this->userRepositoryContract->store(new UserStore($request));
    }
}
