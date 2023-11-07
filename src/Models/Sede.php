<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Contracts\Model;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class Sede implements Model
{
    public string $indirizzo;
    public string $cap;
    public string $comune;
    public ?string $provincia;
    public ?string $nazione;
    public string $tipoFattura;

    public function __construct(...$args)
    {
        $this->indirizzo = $args[0];
        $this->cap = $args[1];
        $this->comune = $args[2];
        $this->provincia = $args[3] ?? null;
        $this->nazione = $args[4] ?? 'IT';
        $this->tipoFattura = $args[5];
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('provincia', new Length(2));
        $metadata->addPropertyConstraint('nazione', new Length(2));
        $metadata->addPropertyConstraint('tipoFattura', new Choice(['T01', 'T02', 'T03']));
    }
}
