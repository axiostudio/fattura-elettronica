<?php

require('vendor/autoload.php');

use Axiostudio\FatturaElettronica\FatturaElettronica;

$fattura = new FatturaElettronica();

$datiTrasmissione = ['12345678910', '123'];
$cedentePrestatore = [['12345678910', 'fornitore srl'], ['via roma', '12345', 'roma', 'rm']];
$cessionarioCommittente = [['12345678910', 'cliente srl'], ['via roma', '12345', 'roma', 'rm']];

$header = [
    $datiTrasmissione,
    $cedentePrestatore,
    $cessionarioCommittente
];

$datiXml = $fattura->create($header);

echo $fattura->createXml($datiXml);

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