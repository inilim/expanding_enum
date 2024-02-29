<?php

namespace Inilim\Trait\Enum;

trait CasesTrait
{
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
