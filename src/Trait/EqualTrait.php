<?php

namespace Inilim\ExpandingEnum\Trait;

trait EqualTrait
{
    function valueEqual(string|int $value, bool $case_insensitive = false): bool
    {
        return \_enumCase()->valueEqual($this, $value, $case_insensitive);
    }

    function nameEqual(string $name, bool $case_insensitive = false): bool
    {
        return \_enumCase()->nameEqual($this, $name, $case_insensitive);
    }

    /**
     * @param class-string<\UnitEnum> $enum
     */
    function classEqual(string $enum): bool
    {
        return \_enumCase()->classEqual($this, $enum);
    }

    function caseEqual(\UnitEnum $case): bool
    {
        return \_enumCase()->caseEqual($this, $case);
    }
}
