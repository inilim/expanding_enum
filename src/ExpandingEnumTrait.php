<?php

namespace Inilim\Trait\Enum;

use Inilim\Trait\Enum\CasesTrait;
use Inilim\Trait\Enum\CasesNameTrait;
use Inilim\Trait\Enum\CasesValueTrait;
use Inilim\Trait\Enum\GetValueTrait;
use Inilim\Trait\Enum\HasTrait;
use Inilim\Trait\Enum\ItTrait;
use Inilim\Trait\Enum\FromNameTrait;
use Inilim\Trait\Enum\GetLowerNameTrait;
use Inilim\Trait\Enum\GetLowerValueTrait;
use Inilim\Trait\Enum\GetUpperNameTrait;
use Inilim\Trait\Enum\GetUpperValueTrait;
use Inilim\Trait\Enum\StringEnumTrait;

trait ExpandingEnumTrait
{
   use CasesTrait,
      CasesValueTrait,
      CasesNameTrait,
      GetValueTrait,
      ItTrait,
      HasTrait,
      FromNameTrait,
      StringEnumTrait,
      GetLowerNameTrait,
      GetLowerValueTrait,
      GetUpperValueTrait,
      GetUpperNameTrait;
}
