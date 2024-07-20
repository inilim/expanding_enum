<?php

namespace Inilim\ExpandingEnum\Trait;

use Inilim\ExpandingEnum\Enum;
use Inilim\ExpandingEnum\EnumItem;

trait EnumObjectTrait
{
    static function getEnumObj(): Enum
    {
        return \_enum()->getEnumObj(self::class);
    }

    function getEnumItemObj(): EnumItem
    {
        return \_enum()->getEnumItemObj($this);
    }
}
