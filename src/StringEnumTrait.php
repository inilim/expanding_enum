<?php

namespace Inilim\Trait\Enum;

trait StringEnumTrait
{
    /**
     * "namespace::enum"
     */
    public function string(): string
    {
        return $this::class . '::' . $this->name;
    }
}
