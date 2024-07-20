<?php

namespace Inilim\ExpandingEnum\Trait;

trait HasTrait
{
   static function hasValue(string|int $value, bool $case_insensitive = false): bool
   {
      return \_enum()->hasValue(self::class, $value, $case_insensitive);
   }

   static function hasName(string $name, bool $case_insensitive = false): bool
   {
      return \_enum()->hasValue(self::class, $name, $case_insensitive);
   }
}
