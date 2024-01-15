<?php

namespace Src\Application\Home\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Application\Home\Infrastructure\Exceptions\StausException;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;

final class StatusController extends CustomController
{
    use HttpCodesHelper;

    public function __invoke(): JsonResponse
    {
        try {
            $this->connect();

            return $this->jsonResponse(
                $this->ok(),
                false,
                'OK',
            );
        } catch (\Throwable $th) {
            throw new StausException('NOT OK', $this->notService());
        }
    }
}
