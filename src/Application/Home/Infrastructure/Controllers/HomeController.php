<?php

namespace Src\Application\Home\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;
use Src\Shared\Infrastructure\Controllers\CustomController;

final class HomeController extends CustomController
{
    use HttpCodesHelper;

    public function __invoke(DB $db): JsonResponse
    {
        try {
            $this->connect();

            return $this->jsonResponse(
                $this->ok(),
                false,
                [
                    'title' => 'HEXARCH2 demo',
                    'home' => 'Hail from HEXARCH2 APIREST',
                    'version' => env('APP_VERSION'),
                ],
            );
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    private function connect(): void
    {
        DB::connection()->getPdo();
    }
}
