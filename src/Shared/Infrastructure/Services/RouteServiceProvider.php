<?php

namespace Src\Shared\Infrastructure\Services;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

abstract class RouteServiceProvider extends ServiceProvider
{
    private mixed  $prefix;
    private mixed  $namespaceName;
    private mixed  $group;
    private ?bool  $except;

    public function setDependency(mixed $prefix, mixed $namespaceName, mixed $group, ?bool $except = null): void
    {
        $this->prefix = $prefix;
        $this->namespaceName = $namespaceName;
        $this->group = $group;
        $this->except = $except;
    }

    public function boot(): void
    {
        parent::boot();
    }

    public function map(): void
    {
        $this->mapRoutes();
    }

    public function mapRoutes(): void
    {
        $validations = ['api', ];
        if (!$this->except) {
            $validations[] = 'jwt';
        }

        Route::middleware($validations)
            ->prefix($this->prefix)
            ->namespace($this->namespaceName)
            ->group(base_path($this->group));
    }

}
