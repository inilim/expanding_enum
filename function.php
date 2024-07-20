<?php

use Inilim\ExpandingEnum\EnumUtil;
use Inilim\ExpandingEnum\EnumItemUtil;

if (!\function_exists('_enum')) {
    function _enum(): EnumUtil
    {
        static $o = new EnumUtil;
        return $o;
    }
}

if (!\function_exists('_enumItem')) {
    function _enumItem(): EnumItemUtil
    {
        static $o = new EnumItemUtil;
        return $o;
    }
}
