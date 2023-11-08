<?php

namespace Axiostudio\FatturaElettronica\Models;

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Axiostudio\FatturaElettronica\Contracts\ModelInterface;

class Sede extends Model implements ModelInterface
{
    public string $Indirizzo;
    public string $Cap;
    public string $Comune;
    public ?string $Provincia;
    public ?string $Nazione;

    public function __construct(...$args)
    {
        $this->Indirizzo = $args[0];
        $this->Cap = $args[1];
        $this->Comune = $args[2];
        $this->Provincia = (isset($args[3]) && $args[3]) ? $args[3] : null;
        $this->Nazione = (isset($args[4]) && $args[4]) ? $args[4] : 'IT';
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('Provincia', new Length(2));
        $metadata->addPropertyConstraint('Nazione', new Length(2));
    }
}
