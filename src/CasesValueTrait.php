<?php

namespace Inilim\Trait\Enum;

trait CasesValueTrait
{
    /**
     * @return array<int|string>|array{}
     */
    public static function casesLowerValue(): array
    {
        $t = self::casesValue();
        if (!$t) return [];
        if (\is_int($t[0])) return $t;
        return \array_map(fn ($k) => \mb_strtolower($k, 'UTF-8'), $t);
    }

    /**
     * @return array<int|string>|array{}
     */
    public static function casesUpperValue(): array
    {
        $t = self::casesValue();
        if (!$t) return [];
        if (\is_int($t[0])) return $t;
        return \array_map(fn ($k) => \mb_strtoupper($k, 'UTF-8'), $t);
    }

    /**
     * @return array<int|string>|array{}
     */
    public static function casesValue(): array
    {
        return \array_column(self::cases(), 'value');
    }
}
