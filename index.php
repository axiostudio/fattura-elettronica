<?php

require('vendor/autoload.php');

use Axiostudio\FatturaElettronica\DTO\Sede;
use Axiostudio\FatturaElettronica\FatturaElettronica;

$test = new FatturaElettronica();

$prova = $test->block(new Sede(
    'Via Roma 1',
    '00100',
    'Roma',
    'RM',
    'IT',
    'T01'
));

var_dump($prova->tipoFattura);
