<?php

namespace Inilim\Trait\Enum;

trait GetLowerNameTrait
{
    public function getLowerName(): string
    {
        return \mb_strtolower($this->name, 'UTF-8');
    }
}
