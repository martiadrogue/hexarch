<?php

namespace Src\Shared\Domain\ValueObjets;

abstract class IntValueObjet
{
    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}
