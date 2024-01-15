<?php

namespace Src\Application\User\Domain;

use Src\Shared\Domain\Domain;
use Src\Shared\Domain\Helper\HttpCodesDomainHelper;
use Src\Application\User\Domain\Exceptions\UserNotFoundException;

final class User extends Domain
{
    private const USER_NOT_FOUND = 'USER_NOT_FOUND';

    use HttpCodesDomainHelper;

    public function isException(?string $exception): void
    {
        if (!is_null($exception)) {
            match($exception) {
                self::USER_NOT_FOUND => throw new UserNotFoundException('User not found', $this->notFound())
            };
        }
    }
}
