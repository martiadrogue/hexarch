<?php

namespace Src\Management\Forgot\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Management\Forgot\Application\Mail\ForgotUserForgotPasswordUseCase;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;

final class ForgotUserForgotPasswordController extends CustomController
{
    use HttpCodesHelper;

    private ForgotUserForgotPasswordUseCase $forgotUserForgotPasswordUseCase;

    public function __construct(ForgotUserForgotPasswordUseCase $forgotUserForgotPasswordUseCase)
    {
        $this->forgotUserForgotPasswordUseCase = $forgotUserForgotPasswordUseCase;

    }

    public function __invoke(Request $request): JsonResponse
    {
        return $this->jsonResponse(
            $this->ok(),
            false,
            $this->forgotUserForgotPasswordUseCase->__invoke($request->toArray())->entity(),
        );
    }

}
