<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Contracts\Model;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class Sede implements Model
{
    public string $Indirizzo;
    public string $Cap;
    public string $Comune;
    public ?string $Provincia;
    public ?string $Nazione;
    public string $TipoFattura;

    public function __construct(...$args)
    {
        $this->Indirizzo = $args[0];
        $this->Cap = $args[1];
        $this->Comune = $args[2];
        $this->Provincia = $args[3] ?? null;
        $this->Nazione = $args[4] ?? 'IT';
        $this->TipoFattura = $args[5];
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('Provincia', new Length(2));
        $metadata->addPropertyConstraint('Nazione', new Length(2));
        $metadata->addPropertyConstraint('TipoFattura', new Choice(['T01', 'T02', 'T03']));
    }
}
