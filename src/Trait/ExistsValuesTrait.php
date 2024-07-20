<?php

namespace Inilim\ExpandingEnum\Trait;

trait ExistsValuesTrait
{
    static function existsValues(): bool
    {
        return \_enum()->existsValues(self::class);
    }

    static function existsStrValues(): bool
    {
        return \_enum()->existsStrValues(self::class);
    }

    static function existsIntValues(): bool
    {
        return \_enum()->existsIntValues(self::class);
    }
}
