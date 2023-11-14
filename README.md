# Fattura Elettronica PHP

[![Latest Version on Packagist](https://img.shields.io/packagist/v/axiostudio/fattura-elettronica.svg?style=flat-square)](https://packagist.org/packages/axiostudio/fattura-elettronica)
[![Tests](https://github.com/axiostudio/fattura-elettronica/actions/workflows/tests.yml/badge.svg)](https://github.com/axiostudio/fattura-elettronica/actions/workflows/tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/axiostudio/fattura-elettronica.svg?style=flat-square)](https://packagist.org/packages/axiostudio/fattura-elettronica)

## Introduzione

Fattura Elettronica è un pacchetto PHP che consente di generare all'interno del proprio applicativo, fatture elettroniche in XML compatibili con le seguenti specifiche: https://www.agenziaentrate.gov.it/portale/web/guest/fatturazione-elettronica-e-dati-fatture-transfrontaliere-new

## Requisiti

- Composer 2
- PHP 8.1 o 8.2

## Installazione

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

Ricordiamo che il pacchetto è in fase BETA, le specifiche dei vari Model utilizzati saranno documentati nella versione 1.0. Di seguito un esempio di utilizzo:

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

Questo pacchetto è in versione BETA, per supporto o bug utilizzare le Issue di Github, per collaborare invece è sufficente aprire un PR con le specifiche dell'integrazione eseguita.

## Credits

Questo pacchetto è stato creato ed è mantenuto da Axio Studio, per maggiori informazioni: https://axio.studio.
