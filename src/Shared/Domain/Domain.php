<?php

namespace Src\Shared\Domain;

abstract class Domain
{
    private mixed $entity;
    private mixed $exception;

    public function __construct(mixed $entity = null, ?string $exception = null)
    {
        $this->entity = $entity;
        $this->exception = $exception;

        $this->isException($this->exception);
    }

    public function entity(): mixed
    {
        return $this->entity;
    }

    protected abstract function isException(?string $exception): void;

}
