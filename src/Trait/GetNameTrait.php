<?php

namespace Inilim\ExpandingEnum\Trait;

trait GetNameTrait
{
    function getName(): string
    {
        return \_enumCase()->n($this);
    }

    function n(): string
    {
        return \_enumCase()->n($this);
    }
}
