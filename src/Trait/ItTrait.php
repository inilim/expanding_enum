<?php

namespace Inilim\ExpandingEnum\Trait;

trait ItTrait
{
    /**
     * @deprecated
     */
    function itValue(string|int $it, bool $case_insensitive = false): bool
    {
        return \_enumItem()->valueEqual($this, $it, $case_insensitive);
    }

    /**
     * @deprecated
     */
    function itName(string $it, bool $case_insensitive = false): bool
    {
        return \_enumItem()->nameEqual($this, $it, $case_insensitive);
    }
}
