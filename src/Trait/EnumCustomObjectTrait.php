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
    static function getObj()
    {
        return new (self::CLASS_OBJ)(self::class);
    }

    /**
     * @return TEnumCase
     */
    function getCaseObj()
    {
        return new (self::CLASS_CASE_OBJ)($this);
    }
}
