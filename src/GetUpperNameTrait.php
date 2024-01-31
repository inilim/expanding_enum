<?php

namespace Inilim\Trait\Enum;

trait GetUpperNameTrait
{
    public function getUpperName(): string
    {
        return \mb_strtoupper($this->name, 'UTF-8');
    }
}
