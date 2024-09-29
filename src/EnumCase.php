<?php

namespace Inilim\ExpandingEnum;

use Inilim\ExpandingEnum\Enum;
use Inilim\ExpandingEnum\EnumAbstract;
use Inilim\ExpandingEnum\EnumCaseUtil;

/**
 * @template TCase of object
 * @template TClass of class-string
 * @psalm-immutable
 */
class EnumCase extends EnumAbstract
{

    protected readonly EnumCaseUtil $caseUtil;

    /**
     * @param TCase $case
     */
    function __construct(
        /**
         * @var TCase
         */
        public readonly \UnitEnum $case
    ) {
        $this->caseUtil = \_enumCase();
    }

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
        return $this->caseUtil->getObj($this->case);
    }

    function existsValue(): bool
    {
        return $this->caseUtil->existsValue($this->case);
    }

    function getLowerName(): string
    {
        return $this->caseUtil->getLowerName($this->case);
    }

    function getLowerValue(): null|string|int
    {
        return $this->caseUtil->getLowerValue($this->case);
    }

    function getUpperName(): string
    {
        return $this->caseUtil->getUpperName($this->case);
    }

    function getUpperValue(): null|string|int
    {
        return $this->caseUtil->getUpperValue($this->case);
    }

    function getName(): string
    {
        return $this->caseUtil->n($this->case);
    }

    function n(): string
    {
        return $this->caseUtil->n($this->case);
    }

    function toString(): string
    {
        return $this->caseUtil->toString($this->case);
    }

    function className(): string
    {
        return $this->caseUtil->className($this->case);
    }

    function class(): string
    {
        return $this->caseUtil->class($this->case);
    }

    function getValue(): string|int|null
    {
        return $this->caseUtil->v($this->case);
    }

    function v(): string|int|null
    {
        return $this->caseUtil->v($this->case);
    }

    function valueEqual(string|int $value, bool $case_insensitive = false): bool
    {
        return $this->caseUtil->valueEqual($this->case, $value, $case_insensitive);
    }

    function nameEqual(string $name, bool $case_insensitive = false): bool
    {
        return $this->caseUtil->nameEqual($this->case, $name, $case_insensitive);
    }

    function classEqual(string $class): bool
    {
        return $this->caseUtil->classEqual($this->case, $class);
    }
}
