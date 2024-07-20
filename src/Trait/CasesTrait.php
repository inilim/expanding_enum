<?php

namespace Inilim\ExpandingEnum\Trait;

trait CasesTrait
{
   /**
    * NAME => VALUE OR NULL
    * @return array<string,int|string|null>
    */
   static function casesAll(): array
   {
      return \_enum()->casesAll(self::class);
   }
}
