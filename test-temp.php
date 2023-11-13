<?php

declare(strict_types=1);

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 * Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

require 'vendor/autoload.php';

use Axiostudio\FatturaElettronica\FatturaElettronica;

$fattura = new FatturaElettronica();

$datiTrasmissione = ['12345678910', '123'];

$anagraficaPrestatore = ['12345678910', 'fornitore srl'];
$sedePrestatore = ['via roma', '12345', 'roma', 'RM'];

$cedentePrestatore = [$anagraficaPrestatore, $sedePrestatore];

$anagraficaCommittente = ['12345678915', 'cliente srl'];
$sedeCommittente = ['via roma', '12345', 'roma', 'RM'];

$cessionarioCommittente = [$anagraficaCommittente, $sedeCommittente];

$header = [
    $datiTrasmissione,
    $cedentePrestatore,
    $cessionarioCommittente,
];

$datiGeneraliDocumento = ['123', '2021-01-01', '345.22'];

$datiGenerali = [$datiGeneraliDocumento];

$dettaglioPagamento = ['345.22'];

$datiDatiPagamento = [$dettaglioPagamento];

$body = [
    $datiGenerali,
    $datiDatiPagamento,
];

$dettaglioLinee = [
    ['Test Riga 1', '100.50'],
    ['Test Riga 2', '100.50'],
    ['Test Riga 3', '100.00', '1', 'pz', '0.00', 'N2.1'],
];

$datiRiepilogo = [
    ['201.00', '22.00'],
    ['100.00', '0.00', 'N2.1'],
];

// TODO -> Fattura -> COMPOSE( passando dati e creando struttura per create !!!)

$datiXml = $fattura->compose($header, $body, $dettaglioLinee, $datiRiepilogo);

var_dump($datiXml);

/*
$data = [

    'FatturaElettronicaBody' => [
        'DatiGenerali' => [
            'DatiGeneraliDocumento' => [
                'TipoDocumento' => 'TD01',
                'Divisa' => 'EUR',
                'Data' => '2021-01-01',
                'Numero' => '1',
                'ImportoTotaleDocumento' => '100.00',
                'Causale' => 'Causale',
            ]
        ],
        'DatiBeniServizi' => [
            'DettaglioLinee' => [
                'NumeroLinea' => '1',
                'Descrizione' => 'Descrizione',
                'Quantita' => '1.00',
                'PrezzoUnitario' => '100.00',
                'PrezzoTotale' => '100.00',
                'AliquotaIVA' => '22.00',
            ],
            'DatiRiepilogo' => [
                'AliquotaIVA' => '22.00',
                'ImponibileImporto' => '100.00',
                'Imposta' => '22.00',
            ]
        ],
        'DatiPagamento' => [
            'CondizioniPagamento' => 'TP02',
            'DettaglioPagamento' => [
                'Beneficiario' => 'Axio Studio S.r.l.',
                'ModalitaPagamento' => 'MP01',
                'DataScadenzaPagamento' => '2021-01-01',
                'ImportoPagamento' => '100.00',
                'IstitutoFinanziario' => 'Istituto Finanziario',
                'IBAN' => 'IT95K0842571151000031526155',
                'ABI' => '08425',
                'CAB' => '71151',
                'BIC' => 'CRACIT33',
                'DataRiferimentoTerminiPagamento' => '2021-01-01',
                'GiorniTerminiPagamento' => '20',
            ]
        ]
    ]
];
*/
