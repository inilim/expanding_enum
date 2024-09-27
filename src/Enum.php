<?php

namespace Inilim\ExpandingEnum;

use Inilim\ExpandingEnum\EnumCase;
use Inilim\ExpandingEnum\EnumAbstract;

/**
 * @template TCase of object
 * @template TClass of class-string
 */
class Enum extends EnumAbstract
{
    /**
     * @var class-string<TCase>
     */
    public readonly string $enum;

    /**
     * @param class-string<TCase>|EnumAbstract<TCase|TClass>|TCase $enum
     */
    function __construct($enum)
    {
        if (\_enum()->acceptable($enum)) {
            $this->enum = \_enum()->getClassFromAcceptable($enum);
        } else {
            throw new \RuntimeException('enum "' . $enum . '" not found');
        }
    }

    /**
     * @return class-string<TCase>
     */
    function getEnumClass(): string
    {
        return $this->enum;
    }

    /**
     * @param class-string<\UnitEnum> $class
     */
    function classEqual(string $class): bool
    {
        return \_enum()->classEqual($this->enum, $class);
    }

    /**
     * @return TCase
     */
    function fromValue(int|string $value, bool $case_insensitive = false): \BackedEnum
    {
        return \_enum()->fromValue($this->enum, $value, $case_insensitive);
    }

    /**
     * @return ?TCase
     */
    function tryFromValue(int|string $value, bool $case_insensitive = false): ?\BackedEnum
    {
        return \_enum()->tryFromValue($this->enum, $value, $case_insensitive);
    }

    /**
     * @return EnumCase<TCase>
     */
    function fromValueToCaseObj(int|string $value, bool $case_insensitive = false): EnumCase
    {
        return \_enum()->fromValueToCaseObj($this->enum, $value, $case_insensitive);
    }

    /**
     * @return ?EnumCase<TCase>
     */
    function tryFromValueToCaseObj(int|string $value, bool $case_insensitive = false): ?EnumCase
    {
        return \_enum()->tryFromValueToCaseObj($this->enum, $value, $case_insensitive);
    }

    /**
     * @return EnumCase<TCase>
     */
    function fromNameToCaseObj(string $name, bool $case_insensitive = false): EnumCase
    {
        return \_enum()->fromNameToCaseObj($this->enum, $name, $case_insensitive);
    }

    /**
     * @return ?EnumCase<TCase>
     */
    function tryFromNameToCaseObj(string $name, bool $case_insensitive = false): ?EnumCase
    {
        return \_enum()->tryFromNameToCaseObj($this->enum, $name, $case_insensitive);
    }

    function count(): int
    {
        return \_enum()->count($this->enum);
    }

    /**
     * @return TCase[]
     */
    function cases(): array
    {
        return \_enum()->cases($this->enum);
    }

    /**
     * @return string[]
     */
    function casesName(): array
    {
        return \_enum()->casesName($this->enum);
    }

    /**
     * @return string[]
     */
    function casesLowerName(): array
    {
        return \_enum()->casesLowerName($this->enum);
    }

    /**
     * @return string[]
     */
    function casesUpperName(): array
    {
        return \_enum()->casesUpperName($this->enum);
    }

    /**
     * @return array<string,int|string|null>
     */
    function casesAll(): array
    {
        return \_enum()->casesAll($this->enum);
    }

    /**
     * @return array<int|string>|array{}
     */
    function casesLowerValue(): array
    {
        return \_enum()->casesLowerValue($this->enum);
    }

    /**
     * @return array<int|string>|array{}
     */
    function casesUpperValue(): array
    {
        return \_enum()->casesUpperValue($this->enum);
    }

    /**
     * @return array<int|string>|array{}
     */
    function casesValue(): array
    {
        return \_enum()->casesValue($this->enum);
    }

    function existsStrValues(): bool
    {
        return \_enum()->existsStrValues($this->enum);
    }

    function existsIntValues(): bool
    {
        return \_enum()->existsIntValues($this->enum);
    }

    function existsValues(): bool
    {
        return \_enum()->existsValues($this->enum);
    }

    /**
     * @return TCase
     */
    function fromName(string $name, bool $case_insensitive = false): \UnitEnum
    {
        return \_enum()->fromName($this->enum, $name, $case_insensitive);
    }

    /**
     * @return ?TCase
     */
    function tryFromName(string $name, bool $case_insensitive = false): ?\UnitEnum
    {
        return \_enum()->tryFromName($this->enum, $name, $case_insensitive);
    }

    function hasValue(string|int $value, bool $case_insensitive = false): bool
    {
        return \_enum()->hasValue($this->enum, $value, $case_insensitive);
    }

    function hasName(string $name, bool $case_insensitive = false): bool
    {
        return \_enum()->hasName($this->enum, $name, $case_insensitive);
    }
}
