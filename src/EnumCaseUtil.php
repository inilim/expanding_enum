<?php

namespace Inilim\ExpandingEnum;

use Inilim\ExpandingEnum\UtilAbstract;

class EnumCaseUtil extends UtilAbstract
{
    // ------------------------------------------------------------------
    // ExistsValueTrait
    // ------------------------------------------------------------------

    function existsStrValue(\UnitEnum $case): bool
    {
        if (!$this->existsValue($case)) return false;
        return \is_string($this->v($case));
    }

    function existsIntValue(\UnitEnum $case): bool
    {
        if (!$this->existsValue($case)) return false;
        return \is_int($this->v($case));
    }

    function existsValue(\UnitEnum $case): bool
    {
        return isset($case->value);
    }

    // ------------------------------------------------------------------
    // GetLowerNameTrait
    // ------------------------------------------------------------------

    function getLowerName(\UnitEnum $case): string
    {
        return $this->lower($this->n($case));
    }

    // ------------------------------------------------------------------
    // GetLowerValueTrait
    // ------------------------------------------------------------------

    function getLowerValue(\UnitEnum $case): null|string|int
    {
        $v = $this->v($case);
        if ($v === null || \is_int($v)) return $v;
        return $this->lower($v);
    }

    // ------------------------------------------------------------------
    // GetUpperNameTrait
    // ------------------------------------------------------------------

    function getUpperName(\UnitEnum $case): string
    {
        return $this->upper($this->n($case));
    }

    // ------------------------------------------------------------------
    // GetUpperValueTrait
    // ------------------------------------------------------------------

    function getUpperValue(\UnitEnum $case): null|string|int
    {
        $v = $this->v($case);
        if ($v === null || \is_int($v)) return $v;
        return $this->upper($v);
    }

    // ------------------------------------------------------------------
    // GetNameTrait
    // ------------------------------------------------------------------

    function getName(\UnitEnum $case): string
    {
        return $case->name;
    }

    /**
     * short
     */
    function n(\UnitEnum $case): string
    {
        return $case->name;
    }

    // ------------------------------------------------------------------
    // StringEnumTrait
    // ------------------------------------------------------------------

    /**
     * "class-string::name"
     */
    function toString(\UnitEnum $case): string
    {
        return $this->class($case) . '::' . $this->n($case);
    }

    function className(\UnitEnum $case): string
    {
        return \basename($this->class($case));
    }

    /**
     * @return class-string
     */
    function class(\UnitEnum $case): string
    {
        return $case::class;
    }

    // ------------------------------------------------------------------
    // GetValueTrait
    // ------------------------------------------------------------------

    /**
     * property "->value"
     */
    function getValue(\UnitEnum $case): string|int|null
    {
        return $case->value ?? null;
    }

    /**
     * short
     * property "->value"
     */
    function v(\UnitEnum $case): string|int|null
    {
        return $case->value ?? null;
    }

    // ------------------------------------------------------------------
    // itTrait and EqualTrait
    // ------------------------------------------------------------------

    function valueEqual(\UnitEnum $case, string|int $value, bool $case_insensitive = false): bool
    {
        $v = $this->v($case);
        if ($v === null) return false;
        if (\is_int($v)) return $v === \intval($value);
        return $this->uniform($v, $case_insensitive) === $this->uniform(\strval($value), $case_insensitive);
    }

    function nameEqual(\UnitEnum $case, string $name, bool $case_insensitive = false): bool
    {
        return $this->uniform($this->n($case), $case_insensitive) === $this->uniform($name, $case_insensitive);
    }

    /**
     * @param class-string<\UnitEnum> $class
     */
    function classEqual(\UnitEnum $case, string $class): bool
    {
        return $this->class($case) === $class;
    }

    function caseEqual(\UnitEnum $case1, \UnitEnum $case2): bool
    {
        return $case1 === $case2;
    }
}
