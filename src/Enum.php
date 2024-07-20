<?php

namespace Inilim\ExpandingEnum;

use Inilim\ExpandingEnum\EnumItem;

readonly class Enum
{
    /**
     * @var class-string<\UnitEnum|\BackedEnum>
     */
    public string $enum;

    /**
     * @param class-string<\UnitEnum|\BackedEnum> $string_enum
     */
    function __construct(
        string $enum,
    ) {
        if (\_enum()->isEnum($enum)) {
            $this->enum = $enum;
        } else {
            throw new \RuntimeException('enum "' . $enum . '" not found');
        }
    }

    /**
     * @param class-string<\UnitEnum> $class
     */
    function classEqual(string $class): bool
    {
        return \_enum()->classEqual($this->enum, $class);
    }

    function fromValue(int|string $value, bool $case_insensitive = false): \BackedEnum
    {
        return \_enum()->fromValue($this->enum, $value, $case_insensitive);
    }

    function tryFromValue(int|string $value, bool $case_insensitive = false): ?\BackedEnum
    {
        return \_enum()->tryFromValue($this->enum, $value, $case_insensitive);
    }

    function fromValueToItem(int|string $value, bool $case_insensitive = false): EnumItem
    {
        return \_enum()->fromValueToItem($this->enum, $value, $case_insensitive);
    }

    function tryFromValueToItem(int|string $value, bool $case_insensitive = false): ?EnumItem
    {
        return \_enum()->tryFromValueToItem($this->enum, $value, $case_insensitive);
    }

    function fromNameToItem(string $name, bool $case_insensitive = false): EnumItem
    {
        return \_enum()->fromNameToItem($this->enum, $name, $case_insensitive);
    }

    function tryFromNameToItem(string $name, bool $case_insensitive = false): ?EnumItem
    {
        return \_enum()->tryFromNameToItem($this->enum, $name, $case_insensitive);
    }

    function count(): int
    {
        return \_enum()->count($this->enum);
    }

    /**
     * @return \UnitEnum[]
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

    function fromName(string $name, bool $case_insensitive = false): \UnitEnum
    {
        return \_enum()->fromName($this->enum, $name, $case_insensitive);
    }

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
