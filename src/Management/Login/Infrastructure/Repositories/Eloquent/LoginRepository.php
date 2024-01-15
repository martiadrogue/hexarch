<?php

namespace Src\Management\Login\Infrastructure\Repositories\Eloquent;

use Src\Management\Login\Domain\Login;
use Src\Management\Login\Domain\ValueObjects\LoginAuthentication;
use Src\Management\Login\Domain\Contracts\LoginRepositoryContract;
use Src\Management\Login\Infrastructure\Repositories\Eloquent\User as Model;

final class LoginRepository implements LoginRepositoryContract
{
    private Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function login(LoginAuthentication $loginAuthentication): Login
    {
        $user = $this->userByEmail($loginAuthentication->value()['email']);
        if (!$user) {
            return new Login(null, 'USER_OR_PASSWORD_INCORRECT');
        }

        // $check = $loginAuthentication->checkPassword($loginAuthentication->value()['password'], $user['password']);
        // if (!$check) {
        //     return new Login(null, 'USER_OR_PASSWORD_INCORRECT');
        // }

        return new Login($user);
    }

    private function userByEmail(string $email): ?array
    {
        $user = $this->model
            ->with('roles')
            ->where('email', '=', $email)
            ->select(
                'id',
                'email',
                'first_name',
                'password')
            ->first();

        return $user?->makeVisible('password')->toArray();
    }


}
