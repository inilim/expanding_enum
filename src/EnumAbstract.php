<?php

namespace Inilim\ExpandingEnum;

abstract class EnumAbstract
{
    /**
     * @return class-string<\UnitEnum>
     */
    abstract function getEnumClass(): string;
}
