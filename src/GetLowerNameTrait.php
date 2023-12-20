<?php

namespace Inilim\Trait\Enum;

use function strtolower;

trait GetLowerNameTrait
{
    public function getLowerName(): string
    {
        return strtolower($this->name);
    }
}
