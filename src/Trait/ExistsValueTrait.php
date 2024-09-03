<?php

namespace Inilim\ExpandingEnum\Trait;

trait ExistsValueTrait
{
    function existsValue(): bool
    {
        return \_enumCase()->existsValue($this);
    }

    function existsStrValue(): bool
    {
        return \_enumCase()->existsStrValue($this);
    }

    function existsIntValue(): bool
    {
        return \_enumCase()->existsIntValue($this);
    }
}
