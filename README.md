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

Questo pacchetto è stato creato ed è mantenuto da Axio Studio, per maggiori informazioni: https://axio.studio

<path class="logo-glifo" d="M398.5,193.6c-5-9.2-16.5-12.7-25.8-7.7l-83.4,45l-14.9-23.7l33.9-18.4c9.2-5,12.7-16.5,7.7-25.8
	c-5-9.2-16.5-12.7-25.8-7.7l-36.1,19.6l-64.8-103c-3.4-5.5-9.5-8.8-16-8.8s-12.6,3.3-16.1,8.9L6.2,312c-4.6,7.3-3.7,16.8,2.2,23.1
	c5.9,6.3,15.3,7.8,22.9,3.7l209.6-113.5l14.9,23.7l-99.5,53.7c-9.2,5-12.7,16.5-7.7,25.8c3.4,6.4,10,10,16.7,10c3.1,0,6.1-0.7,9-2.3
	L276,281.3l32.1,51c3.6,5.7,9.8,8.9,16.1,8.9c3.5,0,7-0.9,10.1-2.9c8.9-5.6,11.5-17.3,6-26.2l-30.7-48.8l81.2-43.8
	C400.1,214.3,403.5,202.8,398.5,193.6z M77,270.9l96.3-153.1l47.4,75.3L77,270.9z"></path>
