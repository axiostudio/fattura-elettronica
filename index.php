<?php

require_once 'vendor/autoload.php';

use Spatie\ArrayToXml\ArrayToXml;

$array = [
    'FatturaElettronicaHeader' => [
        'DatiTrasmissione' => [
            'IdTrasmittente' => [
                'IdPaese' => 'IT',
                'IdCodice' => '12345678901',
            ],
            'ProgressivoInvio' => '2023',
            'FormatoTrasmissione' => 'FPR12',
            'CodiceDestinatario' => '0000000',
        ],
        'CedentePrestatore' => [
            'DatiAnagrafici' => [
                'IdFiscaleIVA' => [
                    'IdPaese' => 'IT',
                    'IdCodice' => '12345678901',
                ],
                'CodiceFiscale' => '12345678901',
                'Anagrafica' => [
                    'Denominazione' => 'Denominazione',
                ],
                'RegimeFiscale' => 'RF01'
            ],
            'Sede' => [
                'Indirizzo' => 'Indirizzo',
                'CAP' => '12345',
                'Comune' => 'Comune',
                'Provincia' => 'MI',
                'Nazione' => 'IT',
            ]
        ],
        'CessionarioCommittente' => [
            'DatiAnagrafici' => [
                'IdFiscaleIVA' => [
                    'IdPaese' => 'IT',
                    'IdCodice' => '12345678902',
                ],
                'CodiceFiscale' => '12345678902',
                'Anagrafica' => [
                    'Denominazione' => 'Cliente',
                ]
            ],
            'Sede' => [
                'Indirizzo' => 'Indirizzo',
                'CAP' => '12345',
                'Comune' => 'Comune',
                'Provincia' => 'MI',
                'Nazione' => 'IT',
            ]
        ]
    ],
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

$result = ArrayToXml::convert($array);

$result = str_replace('<?xml version="1.0"?>', '<v1:FatturaElettronica xmlns:v1="http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.2" versione="FPR12">', $result);
$result = str_replace('<root>', '', $result);
$result = str_replace('</root>', '</v1:FatturaElettronica>', $result);

die($result);
