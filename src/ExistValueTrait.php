<?php

namespace Inilim\Trait\Enum;

trait ExistValueTrait
{
    static function existValues(): bool
    {
        return self::cases()[0] instanceof \BackedEnum;
    }

    function existValue(): bool
    {
        return $this instanceof \BackedEnum;
    }
}
