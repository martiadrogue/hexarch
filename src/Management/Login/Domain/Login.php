<?php

namespace Src\Management\Login\Domain;

use Src\Shared\Domain\Domain;

use Src\Management\Login\Domain\Exceptions\NotLoginException;
use Src\Shared\Domain\Helper\HttpCodesDomainHelper;

final class Login extends Domain
{
    use HttpCodesDomainHelper;

    private const USER_OR_PASSWORD_INCORRECT = 'USER_OR_PASSWORD_INCORRECT';
    private const ID_ROLE_DEFAULT = 2;
    private const NAME_ROLE_DEFAULT = 'natural';
    private const ALL_ROLES_ALLOWER = '*';

    private bool $checkRole;

    public function __construct(mixed $entity = null, ?string $exception = null)
    {
        parent::__construct($entity, $exception);
        $this->checkRole = $this->isUserCheckRole();

    }


    public function handler(): array
    {
        return [
            'id' => $this->entity()['id'],
            'email' => $this->entity()['email'],
            'first_name' => $this->entity()['first_name'],
            'roles' => [
                'id' => $this->entity()['roles'][0]['id'] ?? self::ID_ROLE_DEFAULT,
                'name' => $this->entity()['roles'][0]['name'] ?? self::NAME_ROLE_DEFAULT,
            ]
        ];
    }

    public function isException(?string $exception): void
    {
        if (!is_null($exception)) {
            match($exception) {
                self::USER_OR_PASSWORD_INCORRECT => throw new NotLoginException('Email or password incorrect', $this->unauthorized())
            };
        }
    }

    public function getCheckRole(): bool
    {
        return $this->checkRole;
    }

    private function isUserCheckRole(): bool
    {
        if (!array_key_exists('users', $this->entity()) &&
            !array_key_exists('type_roles', $this->entity())) {

                return true;
        }

        if (is_array($this->entity()['type_roles'])) {
            if (!in_array($this->entity()['user']->roles->name, $this->entity()['type_roles'])) {

                return false;
            }

            return true;
        }

        if (self::ALL_ROLES_ALLOWER === $this->entity()['type_roles']) {

            return true;
        }

        if ($this->entity()['user']->roles->name !== $this->entity()['type_roles']) {

            return false;
        }

        return true;
    }
}
