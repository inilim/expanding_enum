<?php

namespace Inilim\ExpandingEnum\Trait;

trait EqualTrait
{
    function valueEqual(string|int $value, bool $case_insensitive = false): bool
    {
        return \_enumItem()->valueEqual($this, $value, $case_insensitive);
    }

    function nameEqual(string $name, bool $case_insensitive = false): bool
    {
        return \_enumItem()->nameEqual($this, $name, $case_insensitive);
    }

    /**
     * @param class-string $enum
     */
    function classEqual(string $enum): bool
    {
        return \_enumItem()->classEqual($this, $enum);
    }

    function enumEqual(\UnitEnum $enum): bool
    {
        return \_enumItem()->enumEqual($this, $enum);
    }
}
