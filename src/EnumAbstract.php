<?php

namespace Inilim\ExpandingEnum;

use Inilim\ExpandingEnum\Enum;
use Inilim\ExpandingEnum\EnumItem;

abstract class EnumAbstract
{
    protected const ENCODING = 'UTF-8';

    /**
     * @param \UnitEnum|class-string<\UnitEnum> $enum
     */
    function getEnumObj(\UnitEnum|string $enum): Enum
    {
        if (\is_string($enum)) {
            return new Enum($enum);
        }
        return new Enum($enum::class);
    }

    function getEnumItemObj(\UnitEnum $enum): EnumItem
    {
        return new EnumItem($enum);
    }

    protected function lower(string $value): string
    {
        return \mb_strtolower($value, self::ENCODING);
    }

    protected function upper(string $value): string
    {
        return \mb_strtoupper($value, self::ENCODING);
    }

    protected function uniform(int|string $value, bool $case_insensitive): string
    {
        return $case_insensitive && \is_string($value) ? $this->lower($value) : $value;
    }
}
