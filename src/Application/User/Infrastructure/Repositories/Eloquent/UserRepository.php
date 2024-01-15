<?php

namespace Src\Application\User\Infrastructure\Repositories\Eloquent;

use Src\Application\User\Domain\User;
use Src\Application\User\Domain\ValueObjects\UserId;
use Src\Application\User\Domain\ValueObjects\UserStore;
use Src\Application\User\Domain\ValueObjects\UserUpdate;
use Src\Application\User\Domain\Contracts\UserRepositoryContract;
use Src\Application\User\Infrastructure\Repositories\Eloquent\User as Model;

final class UserRepository implements UserRepositoryContract
{
    private Model $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    public function index(): User
    {
        $index = $this->model->with('state')->get();

        return new User($index->toArray());
    }

    public function show(UserId $userId): User
    {
        $user = $this->model->with('state')->find($userId->value());

        if(!$user) {
            return new User(null, 'USER_NOT_FOUND');
        }

        return new User($user->toArray());
    }

    public function store(UserStore $userStore): User
    {
        $store = $this->model->create($userStore->handler());

        if (!$store) {
            return new User(null, 'USER_STORE_FAILED');
        }

        return new User($store->toArray());
    }

    public function update(UserUpdate $userUpdate, UserId $userId): User
    {
        $user = $this->model->find($userId->value());

        if(!$user) {
            return new User(null, 'USER_NOT_FOUND');
        }

        $user->update($userUpdate->handler());

        return new User($user->toArray());
    }

    public function destroy(UserId $userId): User
    {
        $user = $this->model->find($userId->value());

        if(!$user) {
            return new User(null, 'USER_NOT_FOUND');
        }

        $user->delete();

        return new User($user->id());
    }

}
