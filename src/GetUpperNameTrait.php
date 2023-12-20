<?php

namespace Inilim\Trait\Enum;

use function strtoupper;

trait GetUpperNameTrait
{
    public function getUpperName(): string
    {
        return strtoupper($this->name);
    }
}
