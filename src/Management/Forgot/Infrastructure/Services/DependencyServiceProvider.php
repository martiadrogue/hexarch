<?php

namespace Src\Management\Forgot\Infrastructure\Services;

use Src\Shared\Infrastructure\Services\DependencyServiceProvider as ServiceProvider;

final class DependencyServiceProvider extends ServiceProvider
{

    public function __construct($app)
    {
        $this->setDependency([
            [
                'use_case' => [
                    \Src\Management\Forgot\Application\Mail\ForgotUserForgotPasswordUseCase::class,
                ],
                'contract' => \Src\Management\Forgot\Domain\Contracts\ForgotMailableContract::class,
                'repository' => \Src\Management\Forgot\Infrastructure\Repositories\Mail\ForgotMailableRepository::class,
            ],
        ]);
        parent::__construct($app);
    }

}
