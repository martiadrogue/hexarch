<?php

namespace Src\Shared\Domain\ValueObjets;

abstract class MixedValueObjet
{
    private mixed $value;

    public function __construct(mixed $value)
    {
        $this->value = $value;
    }

    public function value(): mixed
    {
        return $this->value;
    }

}
