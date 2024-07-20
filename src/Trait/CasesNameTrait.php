<?php

namespace Inilim\ExpandingEnum\Trait;

trait CasesNameTrait
{
    /**
     * @return string[]
     */
    static function casesName(): array
    {
        return \_enum()->casesName(self::class);
    }

    /**
     * @return string[]
     */
    static function casesLowerName(): array
    {
        return \_enum()->casesLowerName(self::class);
    }

    /**
     * @return string[]
     */
    static function casesUpperName(): array
    {
        return \_enum()->casesUpperName(self::class);
    }
}
