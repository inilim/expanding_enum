<?php

namespace Inilim\ExpandingEnum\Trait;

/**
 * @template TEnum of class-string
 * @template TEnumCase of object
 */
trait EnumCustomObjectTrait
{
    /**
     * @return TEnum
     */
    static function getEnumObj()
    {
        return new (self::CLASS_ENUM)(self::class);
    }

    /**
     * @return TEnum
     */
    static function getCachedEnumObj()
    {
        static $o = null;
        return $o ??= new (self::CLASS_ENUM)(self::class);
    }

    /**
     * @return TEnumCase
     */
    function getEnumCaseObj()
    {
        return new (self::CLASS_ENUM_CASE)($this);
    }
}
