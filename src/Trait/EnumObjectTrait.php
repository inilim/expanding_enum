<?php

namespace Inilim\ExpandingEnum\Trait;

use Inilim\ExpandingEnum\Enum;
use Inilim\ExpandingEnum\EnumCase;

/**
 * @template TEnum of class-string
 * @template TEnumCase of object
 */
trait EnumObjectTrait
{
    /**
     * @return Enum<TEnum>
     */
    static function getObj()
    {
        return \_enum()->getObj(self::class);
    }

    /**
     * @return EnumCase<TEnumCase>
     */
    function getCaseObj()
    {
        return \_enum()->getCaseObj($this);
    }
}
