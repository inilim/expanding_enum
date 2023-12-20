<?php

namespace Inilim\Trait\Enum;

use function method_exists;
use function is_null;
use function defined;
use function mb_strtolower;
use function array_column;
use function array_map;
use function in_array;

trait HasTrait
{
   public static function hasValue(string|int $value): bool
   {
      if (method_exists(self::class, 'tryFrom')) return !is_null(self::tryFrom($value));
      return false;
   }

   public static function hasName(string $name, bool $case_insensitive = false): bool
   {
      if (!$case_insensitive) return defined('self::' . $name);

      $fn = fn ($v) => mb_strtolower($v, 'UTF-8');
      $name = $fn($name);
      $names = array_column(self::cases(), 'name');
      $names = array_map($fn, $names);
      return in_array($name, $names, true);
   }
}
