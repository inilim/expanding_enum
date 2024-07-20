<?php

namespace Inilim\ExpandingEnum;

use Inilim\ExpandingEnum\Enum;

readonly class EnumItem
{
    function __construct(
        public \UnitEnum $enum
    ) {
    }

    function getEnum(): \UnitEnum
    {
        return $this->enum;
    }

    function e(): \UnitEnum
    {
        return $this->enum;
    }

    function getEnumObj(): Enum
    {
        return \_enumItem()->getEnumObj($this->enum);
    }

    function existsValue(): bool
    {
        return \_enumItem()->existsValue($this->enum);
    }

    function getLowerName(): string
    {
        return \_enumItem()->getLowerName($this->enum);
    }

    function getLowerValue(): null|string|int
    {
        return \_enumItem()->getLowerValue($this->enum);
    }

    function getUpperName(): string
    {
        return \_enumItem()->getUpperName($this->enum);
    }

    function getUpperValue(): null|string|int
    {
        return \_enumItem()->getUpperValue($this->enum);
    }

    function getName(): string
    {
        return \_enumItem()->n($this->enum);
    }

    function n(): string
    {
        return \_enumItem()->n($this->enum);
    }

    function toString(): string
    {
        return \_enumItem()->toString($this->enum);
    }

    function className(): string
    {
        return \_enumItem()->className($this->enum);
    }

    function class(): string
    {
        return \_enumItem()->class($this->enum);
    }

    function getValue(): string|int|null
    {
        return \_enumItem()->v($this->enum);
    }

    function v(): string|int|null
    {
        return \_enumItem()->v($this->enum);
    }

    function valueEqual(string|int $value, bool $case_insensitive = false): bool
    {
        return \_enumItem()->valueEqual($this->enum, $value, $case_insensitive);
    }

    function nameEqual(string $name, bool $case_insensitive = false): bool
    {
        return \_enumItem()->nameEqual($this->enum, $name, $case_insensitive);
    }

    function classEqual(string $class): bool
    {
        return \_enumItem()->classEqual($this->enum, $class);
    }
}
