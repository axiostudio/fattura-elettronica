<?php

// Test Example File

require('vendor/autoload.php');

use Axiostudio\FatturaElettronica\FatturaElettronica;

$fattura = new FatturaElettronica();

$datiTrasmissione = [
    '12345678910',
    '123'
];

$anagraficaPrestatore = [
    '12345678910',
    'fornitore srl'
];

$sedePrestatore = [
    'via roma',
    '12345',
    'roma',
    'RM'
];

$anagraficaCommittente = [
    '12345678915',
    'cliente srl'
];

$sedeCommittente = [
    'via roma',
    '12345',
    'roma',
    'RM'
];

$datiGeneraliDocumento = [
    '123',
    '2021-01-01',
    '345.22'
];

$datiGenerali = [$datiGeneraliDocumento];

$dettaglioPagamento = ['345.22'];

$datiDatiPagamento = [$dettaglioPagamento];

$dettaglioLinee = [
    ['Test Riga 1', '100.50'],
    ['Test Riga 2', '100.50'],
    ['Test Riga 3', '100.00', '1', 'pz', '0.00', 'N2.1'],
];

$datiRiepilogo = [
    ['201.00', '22.00'],
    ['100.00', '0.00', 'N2.1'],
];

$datiXml = $fattura->compose(
    $datiTrasmissione,
    $anagraficaPrestatore,
    $sedePrestatore,
    $anagraficaCommittente,
    $sedeCommittente,
    $datiGenerali,
    $datiDatiPagamento,
    $dettaglioLinee,
    $datiRiepilogo
);

var_dump($datiXml);
