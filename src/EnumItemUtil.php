<?php

namespace Inilim\ExpandingEnum;

use Inilim\ExpandingEnum\EnumAbstract;

class EnumItemUtil extends EnumAbstract
{
    // ------------------------------------------------------------------
    // ExistsValueTrait
    // ------------------------------------------------------------------

    function existsStrValue(\UnitEnum $enum): bool
    {
        if (!$this->existsValue($enum)) return false;
        return \is_string($this->v($enum));
    }

    function existsIntValue(\UnitEnum $enum): bool
    {
        if (!$this->existsValue($enum)) return false;
        return \is_int($this->v($enum));
    }

    function existsValue(\UnitEnum $enum): bool
    {
        return isset($enum->value);
    }

    // ------------------------------------------------------------------
    // GetLowerNameTrait
    // ------------------------------------------------------------------

    function getLowerName(\UnitEnum $enum): string
    {
        return $this->lower($this->n($enum));
    }

    // ------------------------------------------------------------------
    // GetLowerValueTrait
    // ------------------------------------------------------------------

    function getLowerValue(\UnitEnum $enum): null|string|int
    {
        $v = $this->v($enum);
        if ($v === null || \is_int($v)) return $v;
        return $this->lower($v);
    }

    // ------------------------------------------------------------------
    // GetUpperNameTrait
    // ------------------------------------------------------------------

    function getUpperName(\UnitEnum $enum): string
    {
        return $this->upper($this->n($enum));
    }

    // ------------------------------------------------------------------
    // GetUpperValueTrait
    // ------------------------------------------------------------------

    function getUpperValue(\UnitEnum $enum): null|string|int
    {
        $v = $this->v($enum);
        if ($v === null || \is_int($v)) return $v;
        return $this->upper($v);
    }

    // ------------------------------------------------------------------
    // GetNameTrait
    // ------------------------------------------------------------------

    function getName(\UnitEnum $enum): string
    {
        return $enum->name;
    }

    /**
     * short
     */
    function n(\UnitEnum $enum): string
    {
        return $enum->name;
    }

    // ------------------------------------------------------------------
    // StringEnumTrait
    // ------------------------------------------------------------------

    /**
     * "class-string::name"
     */
    function toString(\UnitEnum $enum): string
    {
        return $this->class($enum) . '::' . $this->n($enum);
    }

    function className(\UnitEnum $enum): string
    {
        return \basename($this->class($enum));
    }

    /**
     * @return class-string
     */
    function class(\UnitEnum $enum): string
    {
        return $enum::class;
    }

    // ------------------------------------------------------------------
    // GetValueTrait
    // ------------------------------------------------------------------

    /**
     * property "->value"
     */
    function getValue(\UnitEnum $enum): string|int|null
    {
        return $enum->value ?? null;
    }

    /**
     * short
     * property "->value"
     */
    function v(\UnitEnum $enum): string|int|null
    {
        return $enum->value ?? null;
    }

    // ------------------------------------------------------------------
    // itTrait and EqualTrait
    // ------------------------------------------------------------------

    function valueEqual(\UnitEnum $enum, string|int $value, bool $case_insensitive = false): bool
    {
        $v = $this->v($enum);
        if ($v === null) return false;
        if (\is_int($v)) return $v === \intval($value);
        return $this->uniform($v, $case_insensitive) === $this->uniform(\strval($value), $case_insensitive);
    }

    function nameEqual(\UnitEnum $enum, string $name, bool $case_insensitive = false): bool
    {
        return $this->uniform($this->n($enum), $case_insensitive) === $this->uniform($name, $case_insensitive);
    }

    /**
     * @param class-string<\UnitEnum> $class
     */
    function classEqual(\UnitEnum $enum, string $class): bool
    {
        return $this->class($enum) === $class;
    }

    function enumEqual(\UnitEnum $enum1, \UnitEnum $enum2): bool
    {
        return $enum1 === $enum2;
    }
}
