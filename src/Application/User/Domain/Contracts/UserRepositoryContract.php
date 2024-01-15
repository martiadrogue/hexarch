<?php

namespace Src\Application\User\Domain\Contracts;

use Src\Application\User\Domain\User;
use Src\Application\User\Domain\ValueObjects\UserId;
use Src\Application\User\Domain\ValueObjects\UserStore;
use Src\Application\User\Domain\ValueObjects\UserUpdate;

interface UserRepositoryContract
{
    public function index(): User;

    public function show(UserId $userId): User;

    public function store(UserStore $userStore): User;

    public function update(UserUpdate $userUpdate, UserId $userId): User;

    public function destroy(UserId $userId): User;
}
