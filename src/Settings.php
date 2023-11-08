<?php

namespace Axiostudio\FatturaElettronica;

class Settings
{
    public static function RegimeFiscale(): array
    {
        return ['RF01', 'RF02', 'RF04', 'RF05', 'RF06', 'RF07', 'RF08', 'RF09', 'RF10', 'RF11', 'FR12', 'RF13', 'RF14', 'RF15', 'RF16', 'RF17', 'RF18', 'RF19'];
    }

    public static function TipoDocumento(): array
    {
        return ['TD01', 'TD02', 'TD03', 'TD04', 'TD05', 'TD06', 'TD16', 'TD17', 'TD18', 'TD19', 'TD20', 'TD21', 'TD22', 'TD23', 'TD24', 'TD25', 'TD26', 'TD27'];
    }

    public static function TipoDocumentoPredefinito(): string
    {
        return 'TD01';
    }

    public static function CausalePredefinita(): string
    {
        return 'Fattura Elettronica';
    }

    public static function ValutaPredefinita(): string
    {
        return 'EUR';
    }
}
