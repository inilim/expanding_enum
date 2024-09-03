<?php

namespace Inilim\ExpandingEnum;

use Inilim\ExpandingEnum\UtilAbstract;
use Inilim\ExpandingEnum\EnumCase;

class EnumUtil extends UtilAbstract
{
    /**
     * @param class-string $enum
     */
    function isEnum(string $enum, bool $autoload = true): bool
    {
        return \enum_exists($enum, $autoload);
    }

    /**
     * @param class-string<\UnitEnum> $enum
     * @param class-string<\UnitEnum> $class
     */
    function classEqual(string $enum, string $class): bool
    {
        return $enum === $class;
    }

    // ------------------------------------------------------------------
    // value to enum
    // ------------------------------------------------------------------

    /**
     * @param class-string<\UnitEnum> $enum
     */
    function fromValue(string $enum, int|string $value, bool $case_insensitive = false): \BackedEnum
    {
        $result = $this->tryFromValue($enum, $value, $case_insensitive);
        if ($result) {
            return $result;
        }
        throw new \ValueError('"' . $value . '" is not a valid backing value for enum "' . $enum . '"');
    }

    /**
     * @param class-string<\UnitEnum> $enum
     */
    function tryFromValue(string $enum, int|string $value, bool $case_insensitive = false): ?\BackedEnum
    {
        if (!$this->existsValues($enum)) return null;
        $c = $case_insensitive;
        foreach ($this->cases($enum) as $enum) {
            if ($this->uniform($enum->value, $c) === $this->uniform($value, $c)) {
                return $enum;
            }
        }

        return null;
    }

    // ------------------------------------------------------------------
    // value to case obj
    // ------------------------------------------------------------------

    /**
     * @param class-string<\UnitEnum> $enum
     */
    function fromValueToCaseObj(string $enum, int|string $value, bool $case_insensitive = false): EnumCase
    {
        $result = $this->tryFromValueToCaseObj($enum, $value, $case_insensitive);
        if ($result) {
            return $result;
        }
        throw new \ValueError('"' . $value . '" is not a valid backing value for enum "' . $enum . '"');
    }

    /**
     * @param class-string<\UnitEnum> $enum
     */
    function tryFromValueToCaseObj(string $enum, int|string $value, bool $case_insensitive = false): ?EnumCase
    {
        $result = $this->tryFromValue($enum, $value, $case_insensitive);
        if ($result) {
            return new EnumCase($result);
        }
        return null;
    }

    // ------------------------------------------------------------------
    // name to case obj
    // ------------------------------------------------------------------

    /**
     * @param class-string<\UnitEnum> $enum
     */
    function fromNameToCaseObj(string $enum, string $name, bool $case_insensitive = false): EnumCase
    {
        $result = $this->tryFromNameToCaseObj($enum, $name, $case_insensitive);
        if ($result) {
            return $result;
        }
        throw new \ValueError('"' . $name . '" is not a valid name for enum "' . $enum . '"');
    }

    /**
     * @param class-string<\UnitEnum> $enum
     */
    function tryFromNameToCaseObj(string $enum, string $name, bool $case_insensitive = false): ?EnumCase
    {
        $result = $this->tryFromName($enum, $name, $case_insensitive);
        if ($result) {
            return new EnumCase($result);
        }
        return null;
    }

    // ------------------------------------------------------------------
    // other
    // ------------------------------------------------------------------

    /**
     * @param class-string<\UnitEnum> $enum
     */
    function count(string $enum): int
    {
        return \array_key_last($this->cases($enum)) + 1;
    }

    /**
     * @param class-string<\UnitEnum> $enum
     * @return \UnitEnum[]
     */
    function cases(string $enum): array
    {
        return $enum::cases();
    }

    // ------------------------------------------------------------------
    // CasesNameTrait
    // ------------------------------------------------------------------

    /**
     * @param class-string<\UnitEnum> $enum
     * @return string[]
     */
    function casesName(string $enum): array
    {
        return \array_column($this->cases($enum), 'name');
    }

    /**
     * @param class-string<\UnitEnum> $enum
     * @return string[]
     */
    function casesLowerName(string $enum): array
    {
        return \array_map($this->lower(...), $this->casesName($enum));
    }

    /**
     * @param class-string<\UnitEnum> $enum
     * @return string[]
     */
    function casesUpperName(string $enum): array
    {
        return \array_map($this->upper(...), $this->casesName($enum));
    }

    // ------------------------------------------------------------------
    // CasesTrait
    // ------------------------------------------------------------------

    /**
     * NAME => VALUE OR NULL
     * @param class-string<\UnitEnum> $enum
     * @return array<string,int|string|null>
     */
    function casesAll(string $enum): array
    {
        return \array_combine(
            $this->casesName($enum),
            $this->existsValues($enum) ? $this->casesValue($enum) : \array_fill(0, $this->count($enum), null)
        );
    }

    // ------------------------------------------------------------------
    // CasesValueTrait
    // ------------------------------------------------------------------

    /**
     * @param class-string<\UnitEnum> $enum
     * @return array<int|string>|array{}
     */
    function casesLowerValue(string $enum): array
    {
        $t = $this->casesValue($enum);
        if (!$t) return [];
        if (\is_int($t[0])) return $t;
        return \array_map($this->lower(...), $t);
    }

    /**
     * @param class-string<\UnitEnum> $enum
     * @return array<int|string>|array{}
     */
    function casesUpperValue(string $enum): array
    {
        $t = $this->casesValue($enum);
        if (!$t) return [];
        if (\is_int($t[0])) return $t;
        return \array_map($this->upper(...), $t);
    }

    /**
     * @param class-string<\UnitEnum> $enum
     * @return array<int|string>|array{}
     */
    function casesValue(string $enum): array
    {
        return \array_column($this->cases($enum), 'value');
    }

    // ------------------------------------------------------------------
    // ExistValuesTrait
    // ------------------------------------------------------------------

    /**
     * @param class-string<\UnitEnum> $enum
     */
    function existsStrValues(string $enum): bool
    {
        if (!$this->existsValues($enum)) return false;
        return \is_string($this->getFirstValue($enum));
    }

    /**
     * @param class-string<\UnitEnum> $enum
     */
    function existsIntValues(string $enum): bool
    {
        if (!$this->existsValues($enum)) return false;
        return \is_int($this->getFirstValue($enum));
    }

    /**
     * @param class-string<\UnitEnum> $enum
     */
    function existsValues(string $enum): bool
    {
        return $this->getFirstValue($enum) !== null;
    }

    // ------------------------------------------------------------------
    // FromNameTrait
    // ------------------------------------------------------------------

    /**
     * @param class-string<\UnitEnum> $enum
     * @param bool $case TRUE регистро независима
     * @throws \ValueError
     */
    function fromName(string $enum, string $name, bool $case_insensitive = false): \UnitEnum
    {
        $result = $this->tryFromName($enum, $name, $case_insensitive);
        if ($result) {
            return $result;
        }
        throw new \ValueError('"' . $name . '" is not a valid name for enum "' . $enum . '"');
    }

    /**
     * @param class-string<\UnitEnum> $enum
     */
    function tryFromName(string $enum, string $name, bool $case_insensitive = false): ?\UnitEnum
    {
        $c = $case_insensitive;
        foreach ($this->cases($enum) as $enum) {
            if ($this->uniform($enum->name, $c) === $this->uniform($name, $c)) {
                return $enum;
            }
        }

        return null;
    }

    // ------------------------------------------------------------------
    // HasTrait
    // ------------------------------------------------------------------

    /**
     * @param class-string<\UnitEnum> $enum
     */
    function hasValue(string $enum, string|int $value, bool $case_insensitive = false): bool
    {
        if ($this->existsValues($enum)) {
            return $this->tryFromValue($enum, $value, $case_insensitive) !== null;
        }
        return false;
    }

    /**
     * @param class-string<\UnitEnum> $enum
     */
    function hasName(string $enum, string $name, bool $case_insensitive = false): bool
    {
        return $case_insensitive
            ? \in_array($this->lower($name), $this->casesLowerName($enum))
            : \defined($enum . '::' . $name);
    }

    // ------------------------------------------------------------------
    // 
    // ------------------------------------------------------------------

    protected function getFirstValue(string $enum): null|string|int
    {
        return $this->cases($enum)[0]->value ?? null;
    }
}
