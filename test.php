<?php

require_once __DIR__ . '/vendor/autoload.php';

use Inilim\ExampleEnum;
use Inilim\Dump\Dump;

Dump::init();



$a = ExampleEnum::getObj()->getRandomCase()->getCaseObj()->toString();


// $b = $a->e();

// dde($a);
