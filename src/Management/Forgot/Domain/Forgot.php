<?php

namespace Src\Management\Forgot\Domain;

use Src\Management\Forgot\Domain\Exceptions\MailFailedException;
use Src\Shared\Domain\Domain;
use Src\Shared\Domain\Helper\HttpCodesDomainHelper;

final class Forgot extends Domain
{
    use HttpCodesDomainHelper;

    const MAIL_FAILED = 'MAIL_FAILED';

    public function isException(?string $exception): void
    {
        if (!is_null($exception)) {
            match($exception) {
                self::MAIL_FAILED => throw new MailFailedException('Mail failed', $this->internalError())
            };
        }
    }

}
