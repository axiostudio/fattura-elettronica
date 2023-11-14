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
