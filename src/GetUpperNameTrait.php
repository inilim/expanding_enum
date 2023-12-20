<?php

namespace Inilim\Trait\Enum;

use function mb_strtoupper;

trait GetUpperNameTrait
{
    public function getUpperName(): string
    {
        return mb_strtoupper($this->name, 'UTF-8');
    }
}
