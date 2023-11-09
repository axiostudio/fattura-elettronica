<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Settings;
use Axiostudio\FatturaElettronica\Abstracts\Model;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class DettaglioLinee extends Model
{
    public string $Descrizione;
    public float $PrezzoUnitario;
    public ?int $Quantita;
    public ?string $UnitaMisura;
    public ?float $AliquotaIVA;
    public ?string $Natura;
    public ?string $CodiceArticolo;
    public ?string $CodiceTipo;

    public function __construct(...$args)
    {
        $this->Descrizione = $args[0];
        $this->PrezzoUnitario = $args[1];
        $this->Quantita = (isset($args[2]) && $args[2]) ? $args[2] : Settings::QuantitaDefault();
        $this->UnitaMisura = (isset($args[3]) && $args[3]) ? $args[3] : Settings::UnitaMisuraDefault();
        $this->AliquotaIVA = (isset($args[4]) && $args[4]) ? $args[4] : Settings::AliquotaIVADefault();

        if (isset($args[5]) && $args[5]) {
            $this->Natura = $args[5];
        }
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('UnitaMisura', new Choice(Settings::UnitaMisura()));
        $metadata->addPropertyConstraint('Natura', new Choice(Settings::Natura()));
    }
}
