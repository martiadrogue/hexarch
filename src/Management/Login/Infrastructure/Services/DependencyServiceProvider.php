<?php

namespace Src\Management\Login\Infrastructure\Services;

use Src\Shared\Infrastructure\Services\DependencyServiceProvider as ServiceProvider;

final class DependencyServiceProvider extends ServiceProvider
{

    public function __construct($app)
    {
        $this->setDependency([
            [
                'use_case' => [
                    \Src\Management\Login\Application\Login\LoginAuthUseCase::class,
                ],
                'contract' => \Src\Management\Login\Domain\Contracts\LoginRepositoryContract::class,
                'repository' => \Src\Management\Login\Infrastructure\Repositories\Eloquent\LoginRepository::class,
            ],
            [
                'use_case' => [
                    \Src\Management\Login\Application\Auth\LoginAuthenticationUseCase::class,
                    \Src\Management\Login\Application\Auth\LoginCheckAuthenticationUseCase::class,
                    \Src\Management\Login\Application\Auth\LoginRoleAuthenticationUseCase::class,
                ],
                'contract' => \Src\Management\Login\Domain\Contracts\LoginAuthenticationContract::class,
                'repository' => \Src\Management\Login\Infrastructure\Repositories\FirebaseJwt\LoginAuthentication::class,
            ],
        ]);
        parent::__construct($app);
    }

}
