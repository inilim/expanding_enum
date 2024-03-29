<?php

namespace Inilim\Trait\Enum;

use ValueError;

trait FromNameTrait
{
    /**
     * @param bool $case TRUE регистро независима
     * @throws ValueError
     */
    public static function fromName(string $name, bool $case_insensitive = false): self
    {
        $enum = self::getEnumByName($name, $case_insensitive);

        if ($enum !== null) return $enum;

        throw new ValueError("$name is not a valid backing value for enum " . self::class);
    }

    public static function tryFromName(string $name, bool $case_insensitive = false): ?self
    {
        return self::getEnumByName($name, $case_insensitive);
    }

    protected static function getEnumByName(string $name, bool $case_insensitive = false): ?self
    {
        $enums      = self::cases();
        $enum_names = \array_column($enums, 'name');
        if ($case_insensitive) {
            $fn         = fn ($v) => \mb_strtolower($v, 'UTF-8');
            $name       = $fn($name);
            $enum_names = \array_map($fn, $enum_names);
        }

        $idx = \array_search($name, $enum_names);
        if (\is_bool($idx)) return null;
        return $enums[$idx];
    }
}
