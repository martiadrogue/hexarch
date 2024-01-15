<?php

namespace Src\Shared\Infrastructure\Helper;

use GuzzleHttp\Psr7\Message;
use Src\Shared\Domain\Helper\HttpCodesDomainHelper;

trait RequestHelper
{
    public function formatErrorsRequest(array $validators): string
    {
        return implode('|', $validators);
    }
}
