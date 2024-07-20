<?php

namespace Inilim\ExpandingEnum\Trait;

trait GetLowerValueTrait
{
    function getLowerValue(): null|string|int
    {
        return \_enumItem()->getLowerValue($this);
    }
}
