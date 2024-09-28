<?php

namespace Inilim\ExpandingEnum\Trait;

trait GetRandomCaseTrait
{
    /**
     * @return self
     */
    static function getRandomCase()
    {
        return \_enum()->getRandomCase(self::class);
    }
}
