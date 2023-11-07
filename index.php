<?php

require('vendor/autoload.php');

use Axiostudio\FatturaElettronica\Models\Sede;
use Axiostudio\FatturaElettronica\FatturaElettronica;

$fattura = new FatturaElettronica();

$data = $fattura->model(new Sede(
    'Via Roma 1',
    '00100',
    'Roma',
    'RM',
    null,
    'T01'
));

var_dump($data);
