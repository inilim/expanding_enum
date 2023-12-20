<?php

namespace Inilim\Trait\Enum;

use function mb_strtolower;

trait GetLowerNameTrait
{
    public function getLowerName(): string
    {
        return mb_strtolower($this->name, 'UTF-8');
    }
}
