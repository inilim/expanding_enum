<?php

namespace Inilim\ExpandingEnum\Trait;

trait ExistsValueTrait
{
    function existsValue(): bool
    {
        return \_enumItem()->existsValue($this);
    }

    function existsStrValue(): bool
    {
        return \_enumItem()->existsStrValue($this);
    }

    function existsIntValue(): bool
    {
        return \_enumItem()->existsIntValue($this);
    }
}
