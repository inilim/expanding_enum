<?php

namespace Inilim\ExpandingEnum;

use Inilim\ExpandingEnum\Enum;
use Inilim\ExpandingEnum\EnumAbstract;

/**
 * @template TCase of object
 * @template TClass of class-string
 */
class EnumCase extends EnumAbstract
{
    /**
     * @param TCase $enum
     */
    function __construct(
        /**
         * @var TCase
         */
        public readonly \UnitEnum $enum
    ) {}

    /**
     * @return TCase
     */
    function getEnum()
    {
        return $this->enum;
    }

    /**
     * @return TCase
     */
    function e()
    {
        return $this->enum;
    }

    /**
     * @return class-string<TCase>
     */
    function getEnumClass(): string
    {
        return $this->enum::class;
    }

    /**
     * @return Enum<TClass>
     */
    function getEnumObj()
    {
        return \_enumCase()->getEnumObj($this->enum);
    }

    function existsValue(): bool
    {
        return \_enumCase()->existsValue($this->enum);
    }

    function getLowerName(): string
    {
        return \_enumCase()->getLowerName($this->enum);
    }

    function getLowerValue(): null|string|int
    {
        return \_enumCase()->getLowerValue($this->enum);
    }

    function getUpperName(): string
    {
        return \_enumCase()->getUpperName($this->enum);
    }

    function getUpperValue(): null|string|int
    {
        return \_enumCase()->getUpperValue($this->enum);
    }

    function getName(): string
    {
        return \_enumCase()->n($this->enum);
    }

    function n(): string
    {
        return \_enumCase()->n($this->enum);
    }

    function toString(): string
    {
        return \_enumCase()->toString($this->enum);
    }

    function className(): string
    {
        return \_enumCase()->className($this->enum);
    }

    function class(): string
    {
        return \_enumCase()->class($this->enum);
    }

    function getValue(): string|int|null
    {
        return \_enumCase()->v($this->enum);
    }

    function v(): string|int|null
    {
        return \_enumCase()->v($this->enum);
    }

    function valueEqual(string|int $value, bool $case_insensitive = false): bool
    {
        return \_enumCase()->valueEqual($this->enum, $value, $case_insensitive);
    }

    function nameEqual(string $name, bool $case_insensitive = false): bool
    {
        return \_enumCase()->nameEqual($this->enum, $name, $case_insensitive);
    }

    function classEqual(string $class): bool
    {
        return \_enumCase()->classEqual($this->enum, $class);
    }
}
