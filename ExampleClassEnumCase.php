<?php

namespace Inilim;

use Inilim\ExampleEnum;
use Inilim\ExpandingEnum\EnumCase;

/**
 * @template-extends EnumCase<ExampleEnum>
 */
class ExampleClassEnumCase extends EnumCase
{
    function getHeader(): string
    {
        return match ($e = $this->e()) {
            $e::ONE   => 'Один',
            $e::TWO   => 'Два',
            $e::THREE => 'Три',
        };
    }
}
