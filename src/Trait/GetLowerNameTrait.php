<?php

namespace Inilim\ExpandingEnum\Trait;

trait GetLowerNameTrait
{
    function getLowerName(): string
    {
        return \_enumCase()->getLowerName($this);
    }
}
