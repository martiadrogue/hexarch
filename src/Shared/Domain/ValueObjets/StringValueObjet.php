<?php

namespace Src\Shared\Domain\ValueObjets;

abstract class StringValueObjet
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
