<?php

namespace Inilim\Trait\Enum;

trait CasesNameTrait
{
    /**
     * @return string[]
     */
    public static function casesName(): array
    {
        return \array_column(self::cases(), 'name');
    }

    /**
     * @return string[]
     */
    public static function casesLowerName(): array
    {
        return \array_map(fn ($k) => \mb_strtolower($k, 'UTF-8'), self::casesName());
    }

    /**
     * @return string[]
     */
    public static function casesUpperName(): array
    {
        return \array_map(fn ($k) => \mb_strtoupper($k, 'UTF-8'), self::casesName());
    }
}
