<?php

namespace Inilim\ExpandingEnum;

use Inilim\ExpandingEnum\Enum;
use Inilim\ExpandingEnum\EnumAbstract;

/**
 * @template TCase of object
 * @template TClass of class-string
 * @psalm-immutable
 */
class EnumCase extends EnumAbstract
{
    /**
     * @param TCase $case
     */
    function __construct(
        /**
         * @var TCase
         */
        public readonly \UnitEnum $case
    ) {}

    /**
     * @return TCase
     */
    function getCase()
    {
        return $this->case;
    }

    /**
     * @return TCase
     */
    function e()
    {
        return $this->case;
    }

    /**
     * @return class-string<TCase>
     */
    function getClass(): string
    {
        return $this->case::class;
    }

    /**
     * @return Enum<TClass>
     */
    function getObj()
    {
        return \_enumCase()->getObj($this->case);
    }

    function existsValue(): bool
    {
        return \_enumCase()->existsValue($this->case);
    }

    function getLowerName(): string
    {
        return \_enumCase()->getLowerName($this->case);
    }

    function getLowerValue(): null|string|int
    {
        return \_enumCase()->getLowerValue($this->case);
    }

    function getUpperName(): string
    {
        return \_enumCase()->getUpperName($this->case);
    }

    function getUpperValue(): null|string|int
    {
        return \_enumCase()->getUpperValue($this->case);
    }

    function getName(): string
    {
        return \_enumCase()->n($this->case);
    }

    function n(): string
    {
        return \_enumCase()->n($this->case);
    }

    function toString(): string
    {
        return \_enumCase()->toString($this->case);
    }

    function className(): string
    {
        return \_enumCase()->className($this->case);
    }

    function class(): string
    {
        return \_enumCase()->class($this->case);
    }

    function getValue(): string|int|null
    {
        return \_enumCase()->v($this->case);
    }

    function v(): string|int|null
    {
        return \_enumCase()->v($this->case);
    }

    function valueEqual(string|int $value, bool $case_insensitive = false): bool
    {
        return \_enumCase()->valueEqual($this->case, $value, $case_insensitive);
    }

    function nameEqual(string $name, bool $case_insensitive = false): bool
    {
        return \_enumCase()->nameEqual($this->case, $name, $case_insensitive);
    }

    function classEqual(string $class): bool
    {
        return \_enumCase()->classEqual($this->case, $class);
    }
}
