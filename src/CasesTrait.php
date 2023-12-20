<?php

namespace Inilim\Trait\Enum;

use function array_map;
use function mb_strtolower;
use function mb_strtoupper;
use function array_combine;
use function array_column;
use function array_fill;
use function sizeof;

trait CasesTrait
{
   /**
    * @return string[]
    */
   public static function casesName(): array
   {
      return array_column(self::cases(), 'name');
   }

   /**
    * @return string[]
    */
   public static function casesLowerName(): array
   {
      return array_map(fn ($k) => mb_strtolower($k, 'UTF-8'), self::casesName());
   }

   /**
    * @return string[]
    */
   public static function casesUpperName(): array
   {
      return array_map(fn ($k) => mb_strtoupper($k, 'UTF-8'), self::casesName());
   }

   /**
    * casesValue
    * @return array<int|string>|array{}
    */
   public static function casesValue(): array
   {
      return array_column(self::cases(), 'value');
   }

   /**
    * NAME_CASE => VALUE_CASE
    * @return array<string,int|string|null>
    */
   public static function casesAll(): array
   {
      $t = self::cases();
      $value = array_column($t, 'value');
      if (is_null($t[0]->value ?? null)) {
         $value = array_fill(0, sizeof($t), null);
      }
      return array_combine(
         array_column($t, 'name'),
         $value
      );
   }
}
