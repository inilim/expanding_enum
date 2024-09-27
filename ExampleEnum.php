<?php

namespace Inilim;

use Inilim\ExampleClassEnum;
use Inilim\ExampleClassEnumCase;
use Inilim\ExpandingEnum\Trait\EnumCustomObjectTrait;

enum ExampleEnum: string
{
    /**
     * @use EnumObjectTrait<self,self>
     */
    // use EnumObjectTrait;
    /**
     * @use EnumCustomObjectTrait<ExampleClassEnum<self>,ExampleClassEnumCase<self>>
     */
    use EnumCustomObjectTrait;

    const CLASS_ENUM      = ExampleClassEnum::class;
    const CLASS_ENUM_CASE = ExampleClassEnumCase::class;

    case ONE   = 'A';
    case TWO   = 'B';
    case THREE = 'C';
}
