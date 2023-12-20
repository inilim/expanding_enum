<?php

namespace Inilim\Trait\Enum;

trait GetValueTrait
{
   /**
    * property "->value"
    */
   public function v(): string|int|null
   {
      return $this->value ?? null;
   }
}
