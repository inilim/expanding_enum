<?php

namespace Inilim\ExpandingEnum\Trait;

trait CasesValueTrait
{
    /**
     * @return array<int|string>|array{}
     */
    static function casesLowerValue(): array
    {
        return \_enum()->casesLowerValue(self::class);
    }

    /**
     * @return array<int|string>|array{}
     */
    static function casesUpperValue(): array
    {
        return \_enum()->casesUpperValue(self::class);
    }

    /**
     * @return array<int|string>|array{}
     */
    static function casesValue(): array
    {
        return \_enum()->casesValue(self::class);
    }
}
