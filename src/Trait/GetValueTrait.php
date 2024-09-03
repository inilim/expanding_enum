<?php

namespace Inilim\ExpandingEnum\Trait;

trait GetValueTrait
{
   function getValue(): string|int|null
   {
      return \_enumCase()->v($this);
   }

   function v(): string|int|null
   {
      return \_enumCase()->v($this);
   }
}
