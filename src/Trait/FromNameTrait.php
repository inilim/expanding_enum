<?php

namespace Inilim\ExpandingEnum\Trait;

use ValueError;

trait FromNameTrait
{
    /**
     * @return self
     * @throws ValueError
     */
    static function fromName(string $name, bool $case_insensitive = false)
    {
        return \_enum()->fromName(self::class, $name, $case_insensitive);
    }

    /**
     * @return self|null
     */
    static function tryFromName(string $name, bool $case_insensitive = false)
    {
        return \_enum()->tryFromName(self::class, $name, $case_insensitive);
    }
}
