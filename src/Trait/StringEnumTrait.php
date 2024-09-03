<?php

namespace Inilim\ExpandingEnum\Trait;

trait StringEnumTrait
{
    /**
     * "class-string::name"
     */
    function toString(): string
    {
        return \_enumCase()->toString($this);
    }

    /**
     * @deprecated
     */
    function string(): string
    {
        return \_enumCase()->toString($this);
    }

    function className(): string
    {
        return \_enumCase()->className($this);
    }
}
