<?php

namespace Inilim\ExpandingEnum\Trait;

use Inilim\ExpandingEnum\Enum;
use Inilim\ExpandingEnum\EnumCase;

trait EnumObjectTrait
{
    static function getEnumObj(): Enum
    {
        return \_enum()->getEnumObj(self::class);
    }

    function getEnumCaseObj(): EnumCase
    {
        return \_enum()->getEnumCaseObj($this);
    }
}
