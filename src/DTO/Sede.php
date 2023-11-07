<?php

namespace Axiostudio\FatturaElettronica\DTO;

use Axiostudio\FatturaElettronica\Contracts\DTO;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Length;
use Axiostudio\FatturaElettronica\Types\TipoFattura;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class Sede implements DTO
{
    public string $indirizzo;
    public string $cap;
    public string $comune;
    public ?string $provincia;
    public ?string $nazione;
    public TipoFattura $tipoFattura;

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
        $metadata->addPropertyConstraint('nazione', new Length(2, 2));
        $metadata->addPropertyConstraint('tipoFattura', new Type(TipoFattura::class));
    }
}
