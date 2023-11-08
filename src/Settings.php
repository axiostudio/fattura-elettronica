<?php

namespace Axiostudio\FatturaElettronica;

class Settings
{
    public static function FormatoTrasmissione(): array
    {
        return ['FPA12', 'FPR12'];
    }

    public static function FormatoTrasmissioneDefault(): string
    {
        return 'FPR12';
    }

    public static function TipoDocumento(): array
    {
        return ['TD01', 'TD02', 'TD03', 'TD04', 'TD05', 'TD06', 'TD16', 'TD17', 'TD18', 'TD19', 'TD20', 'TD21', 'TD22', 'TD23', 'TD24', 'TD25', 'TD26', 'TD27'];
    }

    public static function TipoDocumentoDefault(): string
    {
        return 'TD01';
    }

    public static function RegimeFiscale(): array
    {
        return ['RF01', 'RF02', 'RF04', 'RF05', 'RF06', 'RF07', 'RF08', 'RF09', 'RF10', 'RF11', 'FR12', 'RF13', 'RF14', 'RF15', 'RF16', 'RF17', 'RF18', 'RF19'];
    }

    public static function CondizioniPagamento(): array
    {
        return ['TP01', 'TP02', 'TP03'];
    }

    public static function CondizioniPagamentoDefault(): string
    {
        return 'TP02';
    }

    public static function ModalitaPagamento(): array
    {
        return ['MP01', 'MP02', 'MP03', 'MP04', 'MP05', 'MP06', 'MP07', 'MP08', 'MP09', 'MP10', 'MP11', 'MP12', 'MP13', 'MP14', 'MP15', 'MP16', 'MP17', 'MP18', 'MP19', 'MP20', 'MP21', 'MP22', 'MP23'];
    }

    public static function ModalitaPagamentoDefault(): string
    {
        return 'MP05';
    }

    public static function CausaleDefault(): string
    {
        return 'Fattura Elettronica';
    }

    public static function ValutaDefault(): string
    {
        return 'EUR';
    }

    public static function IdPaeseDefault(): string
    {
        return 'IT';
    }

    public static function CodiceDestinatarioDefault(): string
    {
        return '0000000';
    }

    public static function XmlStart(): string
    {
        return '<v1:FatturaElettronica xmlns:v1="http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.2">';
    }

    public static function XmlEnd(): string
    {
        return '</v1:FatturaElettronica>';
    }
}
