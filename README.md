# Fattura Elettronica PHP

[![Latest Version on Packagist](https://img.shields.io/packagist/v/axiostudio/fattura-elettronica.svg?style=flat-square)](https://packagist.org/packages/axiostudio/fattura-elettronica)
[![Tests](https://github.com/axiostudio/fattura-elettronica/actions/workflows/tests.yml/badge.svg)](https://github.com/axiostudio/fattura-elettronica/actions/workflows/tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/axiostudio/fattura-elettronica.svg?style=flat-square)](https://packagist.org/packages/axiostudio/fattura-elettronica)

## Introduzione

Fattura Elettronica è un pacchetto PHP che consente di generare all'interno del proprio applicativo, fatture elettroniche in XML compatibili con le seguenti specifiche: https://www.agenziaentrate.gov.it/portale/web/guest/fatturazione-elettronica-e-dati-fatture-transfrontaliere-new

## Requisiti

- Composer 2
- PHP (dalla versione 8.1 in poi)

## Installazione

Per installare il pacchetto eseguire:

```bash
composer require axiostudio/fattura-elettronica
```

## Utilizzo

Finita l'installazione, per utilizzare il pacchetto è necessario inizializzare la classe:

```php
$fattura = new \Axiostudio\FatturaElettronica\FatturaElettronica();
```

Successivamente bisogna passare i dati necessari al metodo "compose" che ci restituirà un array contente un parametro `fileName` che dichiara il nome del file XML generato e un parametro `fileContent` che contiene in formato string l'XML generato.

Per generare la fattura è necessario richiamare il metodo `compose()` passando al suo interno i dati necessari alla fattura che saranno parsati, computati e convertiti in formato XML secondo le specifiche.

La funzione "compose" necessita dei seguenti oggetti, nel seguente ordine per comporre la fattura:

- $datiTrasmissione,
- $anagraficaPrestatore,
- $sedePrestatore,
- $anagraficaCommittente,
- $sedeCommittente,
- $datiGenerali,
- $datiDatiPagamento,
- $dettaglioLinee,
- $datiRiepilogo

Ogni oggetto ha una specifica struct con dati obbligatori e dati opzionali. Di seguito la descrizione di essi:

#### DatiAnagrafici

```
public Id $IdFiscaleIVA;
public Anagrafica $Anagrafica;
public ?string $CodiceFiscale;
public ?string $RegimeFiscale;
```

#### Id

```
public string $IdCodice;
public ?string $IdPaese;
```

#### Anagrafica

```
public ?string $Denominazione;
public ?string $Nome;
public ?string $Cognome;
```

#### CedentePrestatore

```
public DatiAnagrafici $DatiAnagrafici;
public Sede $Sede;
```

#### CessionarioCommittente

```
public DatiAnagrafici $DatiAnagrafici;
public Sede $Sede;
```

#### Sede

```
public string $Indirizzo;
public string $CAP;
public string $Comune;
public ?string $Provincia;
public ?string $Nazione;
```

#### DatiGeneraliDocumento

```
public string $Numero;
public string $Data;
public float $ImportoTotaleDocumento;
public ?string $Causale;
public ?string $TipoDocumento;
public ?string $Divisa;
```

#### DatiPagamento

```
public DettaglioPagamento $DettaglioPagamento;
public ?string $CondizioniPagamento;
```

#### DettaglioPagamento

```
public float $ImportoPagamento;
public ?string $DataScadenzaPagamento;
public ?string $DataRiferimentoTerminiPagamento;
public ?string $GiorniTerminiPagamento;
public ?string $Beneficiario;
public ?string $IstituroFinanziario;
public ?string $IBAN;
public ?string $ABI;
public ?string $CAB;
public ?string $BIC;
public ?string $ModalitaPagamento;
```

#### DatiRiepilogo

```
public float $ImponibileImporto;
public float $AliquotaIVA;
public ?string $Natura;
public ?string $EsigibilitaIVA;
public float $Imposta;
```

#### DatiTrasmissione

```
public Id $IdTrasmittente;
public string $ProgressivoInvio;
public ?string $CodiceDestinatario;
public ?string $PECDestinatario;
public ?string $FormatoTrasmissione;
```

#### DettaglioLinee

```
public string $Descrizione;
public float $PrezzoUnitario;
public ?float $Quantita;
public ?string $UnitaMisura;
public ?float $AliquotaIVA;
public ?string $Natura;
public ?float $PrezzoTotale;
```

#### DettaglioPagamento

```
public float $ImportoPagamento;
public ?string $DataScadenzaPagamento;
public ?string $DataRiferimentoTerminiPagamento;
public ?string $GiorniTerminiPagamento;
public ?string $Beneficiario;
public ?string $IstituroFinanziario;
public ?string $IBAN;
public ?string $ABI;
public ?string $CAB;
public ?string $BIC;
public ?string $ModalitaPagamento;
```

Per inizializzare una fattura avremo quindi una struct di questo tipo:

```php
$datiXml = $fattura->compose(
    $datiTrasmissione, // DatiTrasmissione
    $anagraficaPrestatore,  // DatiAnagrafici
    $sedePrestatore, // Sede
    $anagraficaCommittente, // DatiAnagrafici
    $sedeCommittente, // Sede
    $datiGenerali, // DatiGeneraliDocumento
    $datiDatiPagamento, // DatiPagamento
    $dettaglioLinee, // [] DettaglioLinee
    $datiRiepilogo // [] DatiRiepilogo
);
```

Di seguito un semplice esempio di utilizzo:

```php
$fattura = new FatturaElettronica();

$datiTrasmissione = [
    '12345678910',
    '123'
];

$anagraficaPrestatore = [
    '12345678910',
    'Fornitore srl'
];

$sedePrestatore = [
    'Via Verdi',
    '00100',
    'Roma',
    'RM'
];

$anagraficaCommittente = [
    '12345678911',
    'Cliente srl'
];

$sedeCommittente = [
    'Via Puccini',
    '20100',
    'Milano',
    'MI'
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
    ['Articolo di riga 1', '100.50'],
    ['Articolo di riga 2', '100.50'],
    ['Articolo di riga 3', '100.00', '1', 'pz', '0.00', 'N2.1'],
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
```

## Note

Per supporto o bug utilizzare le Issue di Github, per collaborare invece è sufficente aprire un PR con le specifiche dell'integrazione eseguita.

## Credits

Questo pacchetto è stato creato ed è mantenuto da Axio Studio, per maggiori informazioni: https://axio.studio.
