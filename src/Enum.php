<?php

namespace Inilim\ExpandingEnum;

use Inilim\ExpandingEnum\EnumCase;
use Inilim\ExpandingEnum\EnumUtil;
use Inilim\ExpandingEnum\EnumAbstract;

/**
 * @template TCase of object
 * @template TClass of class-string
 * @psalm-immutable
 */
class Enum extends EnumAbstract
{
    /**
     * @var class-string<TCase>
     */
    public readonly string $enum;
    protected readonly EnumUtil $util;

    /**
     * @param class-string<TCase>|EnumAbstract<TCase|TClass>|TCase $enum
     */
    function __construct($enum)
    {
        $this->util = \_enum();
        if ($this->util->acceptable($enum)) {
            $this->enum = $this->util->getClassFromAcceptable($enum);
        } else {
            throw new \RuntimeException('enum "' . $enum . '" not found');
        }
    }

    /**
     * @return class-string<TCase>
     */
    function getClass(): string
    {
        return $this->enum;
    }

    /**
     * @param class-string<\UnitEnum> $class
     */
    function classEqual(string $class): bool
    {
        return $this->util->classEqual($this->enum, $class);
    }

    /**
     * @return TCase
     */
    function fromValue(int|string $value, bool $case_insensitive = false): \BackedEnum
    {
        return $this->util->fromValue($this->enum, $value, $case_insensitive);
    }

    /**
     * @return ?TCase
     */
    function tryFromValue(int|string $value, bool $case_insensitive = false): ?\BackedEnum
    {
        return $this->util->tryFromValue($this->enum, $value, $case_insensitive);
    }

    /**
     * @return EnumCase<TCase>
     */
    function fromValueToCaseObj(int|string $value, bool $case_insensitive = false): EnumCase
    {
        return $this->util->fromValueToCaseObj($this->enum, $value, $case_insensitive);
    }

    /**
     * @return ?EnumCase<TCase>
     */
    function tryFromValueToCaseObj(int|string $value, bool $case_insensitive = false): ?EnumCase
    {
        return $this->util->tryFromValueToCaseObj($this->enum, $value, $case_insensitive);
    }

    /**
     * @return EnumCase<TCase>
     */
    function fromNameToCaseObj(string $name, bool $case_insensitive = false): EnumCase
    {
        return $this->util->fromNameToCaseObj($this->enum, $name, $case_insensitive);
    }

    /**
     * @return ?EnumCase<TCase>
     */
    function tryFromNameToCaseObj(string $name, bool $case_insensitive = false): ?EnumCase
    {
        return $this->util->tryFromNameToCaseObj($this->enum, $name, $case_insensitive);
    }

    /**
     * @return EnumCase<TCase>
     */
    function getRandomCaseObj(): EnumCase
    {
        return $this->util->getRandomCaseObj($this->enum);
    }

    /**
     * @return TCase
     */
    function getRandomCase(): \UnitEnum
    {
        return $this->util->getRandomCase($this->enum);
    }

    function count(): int
    {
        return $this->util->count($this->enum);
    }

    /**
     * @return TCase[]
     */
    function cases(): array
    {
        return $this->util->cases($this->enum);
    }

    /**
     * @return string[]
     */
    function casesName(): array
    {
        return $this->util->casesName($this->enum);
    }

    /**
     * @return string[]
     */
    function casesLowerName(): array
    {
        return $this->util->casesLowerName($this->enum);
    }

    /**
     * @return string[]
     */
    function casesUpperName(): array
    {
        return $this->util->casesUpperName($this->enum);
    }

    /**
     * @return array<string,int|string|null>
     */
    function casesAll(): array
    {
        return $this->util->casesAll($this->enum);
    }

    /**
     * @return array<int|string>|array{}
     */
    function casesLowerValue(): array
    {
        return $this->util->casesLowerValue($this->enum);
    }

    /**
     * @return array<int|string>|array{}
     */
    function casesUpperValue(): array
    {
        return $this->util->casesUpperValue($this->enum);
    }

    /**
     * @return array<int|string>|array{}
     */
    function casesValue(): array
    {
        return $this->util->casesValue($this->enum);
    }

    function existsStrValues(): bool
    {
        return $this->util->existsStrValues($this->enum);
    }

    function existsIntValues(): bool
    {
        return $this->util->existsIntValues($this->enum);
    }

    function existsValues(): bool
    {
        return $this->util->existsValues($this->enum);
    }

    /**
     * @return TCase
     */
    function fromName(string $name, bool $case_insensitive = false): \UnitEnum
    {
        return $this->util->fromName($this->enum, $name, $case_insensitive);
    }

    /**
     * @return ?TCase
     */
    function tryFromName(string $name, bool $case_insensitive = false): ?\UnitEnum
    {
        return $this->util->tryFromName($this->enum, $name, $case_insensitive);
    }

    function hasValue(string|int $value, bool $case_insensitive = false): bool
    {
        return $this->util->hasValue($this->enum, $value, $case_insensitive);
    }

    function hasName(string $name, bool $case_insensitive = false): bool
    {
        return $this->util->hasName($this->enum, $name, $case_insensitive);
    }
}
