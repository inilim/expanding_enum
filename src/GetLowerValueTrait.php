<?php

namespace Inilim\Trait\Enum;

trait GetLowerValueTrait
{
    public function getLowerValue(): null|string|int
    {
        $v = $this->value ?? null;
        /** @var null|string|int $v */
        if ($v === null || \is_int($v)) return $v;
        return \mb_strtolower($v, 'UTF-8');
    }
}
