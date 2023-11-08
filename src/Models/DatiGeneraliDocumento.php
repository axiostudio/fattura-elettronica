<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Settings;
use Symfony\Component\Validator\Constraints\Date;
use Axiostudio\FatturaElettronica\Abstracts\Model;
use Symfony\Component\Validator\Constraints\Choice;
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
        $this->Causale = (isset($args[4]) && $args[4]) ? $args[4] : Settings::CausalePredefinita();
        $this->TipoDocumento = (isset($args[4]) && $args[4]) ? $args[4] : Settings::TipoDocumentoPredefinito();
        $this->Divisa = (isset($args[5]) && $args[5]) ? $args[5] : Settings::ValutaPredefinita();
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('TipoDocumento', new Choice(Settings::TipoDocumento()));
        $metadata->addPropertyConstraint('Divisa', new Length(3));
        $metadata->addPropertyConstraint('Data', new Date());
    }
}
