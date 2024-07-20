<?php

namespace Inilim\ExpandingEnum\Trait;

trait GetNameTrait
{
    function getName(): string
    {
        return \_enumItem()->n($this);
    }

    function n(): string
    {
        return \_enumItem()->n($this);
    }
}
