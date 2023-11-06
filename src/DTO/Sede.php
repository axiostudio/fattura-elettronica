<?php

namespace Axiostudio\FatturaElettronica\DTO;

use Axiostudio\FatturaElettronica\Types\TipoFattura;

final class Sede
{
    public string $Indirizzo;
    public string $Cap;
    public string|TipoFattura $Comune;
    public ?string $Provincia = null;
    public string $Nazione = 'IT';
}
