<?php

namespace Inilim\ExpandingEnum\Trait;

trait StringEnumTrait
{
    /**
     * "class-string::name"
     */
    function toString(): string
    {
        return \_enumItem()->toString($this);
    }

    /**
     * @deprecated
     */
    function string(): string
    {
        return \_enumItem()->toString($this);
    }

    function className(): string
    {
        return \_enumItem()->className($this);
    }
}
