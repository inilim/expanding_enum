<?php

namespace Inilim\Trait\Enum;

trait ItTrait
{
    public function itValue(string|int $it): bool
    {
        $v = $this->value ?? null;
        if (\is_int($v)) return $v === \intval($it);
        elseif (\is_string($v)) return $v === \strval($it);
        return false;
    }

    public function itName(string $it, bool $case_insensitive = false): bool
    {
        $name = $this->name;
        if ($case_insensitive) {
            $fn   = fn ($v) => \mb_strtolower($v, 'UTF-8');
            $name = $fn($name);
            $it   = $fn($it);
        }
        if ($name === $it) return true;
        return false;
    }
}
