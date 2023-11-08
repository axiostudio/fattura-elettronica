<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Abstracts\Model;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class DatiGeneraliDocumento extends Model
{
    public string $Numero;
    public string $Data;
    public float $ImportoTotaleDocumento;
    public ?string $Causale;
    public ?string $TipoDocumento;
    public ?string $Divisa;

    public function __construct(...$args)
    {
        $this->Numero = $args[0];
        $this->Data = $args[1];
        $this->ImportoTotaleDocumento = $args[2];
        $this->Causale = (isset($args[4]) && $args[4]) ? $args[4] : 'Fattura N° ' . $this->Numero;
        $this->TipoDocumento = (isset($args[4]) && $args[4]) ? $args[4] : 'TD01';
        $this->Divisa = (isset($args[5]) && $args[5]) ? $args[5] : 'EUR';
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('TipoDocumento', new Choice(['TD01', 'TD02', 'TD03', 'TD04', 'TD05', 'TD06', 'TD16', 'TD17', 'TD18', 'TD19', 'TD20', 'TD21', 'TD22', 'TD23', 'TD24', 'TD25', 'TD26', 'TD27']));
        $metadata->addPropertyConstraint('Divisa', new Length(3));
        $metadata->addPropertyConstraint('Data', new Date());
    }
}
