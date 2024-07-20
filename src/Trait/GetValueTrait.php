<?php

namespace Inilim\ExpandingEnum\Trait;

trait GetValueTrait
{
   function getValue(): string|int|null
   {
      return \_enumItem()->v($this);
   }

   function v(): string|int|null
   {
      return \_enumItem()->v($this);
   }
}
