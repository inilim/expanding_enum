<?php

namespace Inilim\ExpandingEnum\Trait;

trait GetUpperValueTrait
{
    function getUpperValue(): null|string|int
    {
        return \_enumItem()->getUpperValue($this);
    }
}
