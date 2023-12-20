<?php

namespace Inilim\Trait\Enum;

use function array_map;
use function mb_strtolower;
use function mb_strtoupper;
use function array_combine;
use function array_column;

trait CasesTrait
{
   /**
    * @return string[]
    */
   static public function casesName(): array
   {
      return array_column(self::cases(), 'name');
   }

   /**
    * @return string[]
    */
   static public function casesLowerName(): array
   {
      return array_map(fn ($k) => mb_strtolower($k, 'UTF-8'), self::casesName());
   }

   /**
    * @return string[]
    */
   static public function casesUpperName(): array
   {
      return array_map(fn ($k) => mb_strtoupper($k, 'UTF-8'), self::casesName());
   }

   /**
    * casesValue
    * @return array<int|string>|array{}
    */
   static public function casesValue(): array
   {
      return array_column(self::cases(), 'value');
   }

   /**
    * NAME_CASE => VALUE_CASE
    * @return array<string,int|string>
    */
   static public function casesAll(): array
   {
      $t = self::cases();
      return array_combine(
         array_column($t, 'name'),
         array_column($t, 'value')
      );
   }
}