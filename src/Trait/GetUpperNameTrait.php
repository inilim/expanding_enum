<?php

namespace Inilim\ExpandingEnum\Trait;

trait GetUpperNameTrait
{
    function getUpperName(): string
    {
        return \_enumItem()->getUpperName($this);
    }
}
