<?php

namespace Inilim\Trait\Enum;

trait CasesTrait
{
   /**
    * @return string[]
    */
   public static function casesName(): array
   {
      return \array_column(self::cases(), 'name');
   }

   /**
    * @return string[]
    */
   public static function casesLowerName(): array
   {
      return \array_map(fn ($k) => \mb_strtolower($k, 'UTF-8'), self::casesName());
   }

   /**
    * @return string[]
    */
   public static function casesUpperName(): array
   {
      return \array_map(fn ($k) => \mb_strtoupper($k, 'UTF-8'), self::casesName());
   }

   /**
    * @return array<int|string>|array{}
    */
   public static function casesLowerValue(): array
   {
      $t = self::casesValue();
      if (!$t) return [];
      if (\is_int($t[0])) return $t;
      return \array_map(fn ($k) => \mb_strtolower($k, 'UTF-8'), $t);
   }

   /**
    * @return array<int|string>|array{}
    */
   public static function casesUpperValue(): array
   {
      $t = self::casesValue();
      if (!$t) return [];
      if (\is_int($t[0])) return $t;
      return \array_map(fn ($k) => \mb_strtoupper($k, 'UTF-8'), $t);
   }

   /**
    * @return array<int|string>|array{}
    */
   public static function casesValue(): array
   {
      return \array_column(self::cases(), 'value');
   }

   /**
    * NAME => VALUE OR NULL
    * @return array<string,int|string|null>
    */
   public static function casesAll(): array
   {
      $t     = self::cases();
      $value = \array_column($t, 'value');
      if (($t[0]->value ?? null) === null) {
         $value = \array_fill(0, \sizeof($t), null);
      }
      return \array_combine(
         \array_column($t, 'name'),
         $value
      );
   }
}
