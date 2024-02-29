<?php

namespace Inilim\Trait\Enum;

trait GetUpperValueTrait
{
    public function getUpperValue(): null|string|int
    {
        $v = $this->value ?? null;
        /** @var null|string|int $v */
        if ($v === null || \is_int($v)) return $v;
        return \mb_strtoupper($v, 'UTF-8');
    }
}
