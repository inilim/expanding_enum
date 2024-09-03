<?php

use Inilim\ExpandingEnum\EnumUtil;
use Inilim\ExpandingEnum\EnumCaseUtil;

if (!\function_exists('_enum')) {
    function _enum(): EnumUtil
    {
        static $o = new EnumUtil;
        return $o;
    }
}

if (!\function_exists('_enumCase')) {
    function _enumCase(): EnumCaseUtil
    {
        static $o = new EnumCaseUtil;
        return $o;
    }
}
