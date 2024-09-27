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
    static function getEnumObj()
    {
        return \_enum()->getEnumObj(self::class);
    }

    /**
     * @return Enum<TEnum>
     */
    static function getCachedEnumObj()
    {
        static $o = null;
        return $o ??= \_enum()->getEnumObj(self::class);
    }

    /**
     * @return EnumCase<TEnumCase>
     */
    function getEnumCaseObj()
    {
        return \_enum()->getEnumCaseObj($this);
    }
}
