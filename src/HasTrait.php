<?php

namespace Inilim\Trait\Enum;

trait HasTrait
{
   public static function hasValue(string|int $value): bool
   {
      if (\method_exists(self::class, 'tryFrom')) return self::tryFrom($value) !== null;
      return false;
   }

   public static function hasName(string $name, bool $case_insensitive = false): bool
   {
      if (!$case_insensitive) return \defined('self::' . $name);

      $fn   = fn ($v) => \mb_strtolower($v, 'UTF-8');
      $name = '|' . $fn($name) . '|';
      $list = \array_column(self::cases(), 'name');
      $list = '|' . \implode('|', $list) . '|';
      $list = $fn($list);
      return \str_contains($list, $name);
   }
}
