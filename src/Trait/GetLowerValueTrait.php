<?php

namespace Inilim\ExpandingEnum\Trait;

trait GetLowerValueTrait
{
    function getLowerValue(): null|string|int
    {
        return \_enumCase()->getLowerValue($this);
    }
}
