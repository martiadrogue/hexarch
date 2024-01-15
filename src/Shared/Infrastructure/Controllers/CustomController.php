<?php

namespace Src\Shared\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

abstract class CustomController extends Controller
{
    /**
     * Default Response for the APIRest
     *
     * @param integer $status
     * @param boolean $error
     * @param array|string|integer|boolean $response
     * @return JsonResponse
     */
    protected function jsonResponse(
        int $status,
        bool $error,
        array|string|int|bool $response
    ): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'error' => $error,
            'message' => $response,
        ], $status);
    }
}
