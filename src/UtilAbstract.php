<?php

namespace Inilim\ExpandingEnum;

use Inilim\ExpandingEnum\Enum;
use Inilim\ExpandingEnum\EnumCase;
use Inilim\ExpandingEnum\EnumAbstract;

/**
 * @template TCase of object
 * @template TClass of class-string
 */
abstract class UtilAbstract
{
    protected const ENCODING = 'UTF-8';

    /**
     * @param TCase|TClass $enum
     * @return Enum<TClass>
     */
    function getObj(\UnitEnum|string $enum): Enum
    {
        if (\is_string($enum)) {
            return new Enum($enum);
        }
        return new Enum($enum::class);
    }

    /**
     * @param TCase $case
     * @return EnumCase<TCase>
     */
    function getCaseObj(\UnitEnum $case): EnumCase
    {
        return new EnumCase($case);
    }

    /**
     * допустимое значение для перечисления
     * 
     * @param class-string<TCase>|EnumAbstract<TCase|TClass>|TCase $enum
     */
    function acceptable($enum): bool
    {
        $type = \_other()->gettype($enum);
        if ($type === 'string' && \enum_exists($enum)) {
            return true;
        }
        // 
        elseif ($type === 'enum') {
            return true;
        }
        // 
        elseif ($type === 'object' && $enum instanceof EnumAbstract) {
            return true;
        }
        return false;
    }

    /**
     * допустимое значение для значения перечисления
     * 
     * @param EnumCase<TCase>|TCase $enum
     */
    function acceptableCase($enum): bool
    {
        if (!$this->acceptable($enum)) {
            return false;
        }
        return $enum instanceof \UnitEnum || $enum instanceof EnumCase;
    }

    /**
     * @param class-string<TCase>|EnumAbstract<TCase|TClass>|TCase $enum
     */
    function getClassFromAcceptable($enum): string
    {
        if (!$this->acceptable($enum)) {
            throw new \Exception('given not acceptable value');
        }

        if (\is_string($enum)) {
            return $enum;
        } elseif ($enum instanceof \UnitEnum) {
            return $enum::class;
        } else {
            return $enum->getEnumClass();
        }
    }

    /**
     * @param EnumCase<TCase>|TCase $enum
     */
    function getUnitFromAcceptableCase($enum): \UnitEnum
    {
        if (!$this->acceptableCase($enum)) {
            throw new \Exception('given not acceptable case value');
        }

        if ($enum instanceof \UnitEnum) {
            return $enum;
        } else {
            return $enum->getEnumClass();
        }
    }

    // ------------------------------------------------------------------
    // 
    // ------------------------------------------------------------------

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
