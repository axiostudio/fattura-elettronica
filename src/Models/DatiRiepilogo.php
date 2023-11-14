<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Settings;
use Axiostudio\FatturaElettronica\Abstracts\Model;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class DatiRiepilogo extends Model
{
    public float $ImponibileImporto;
    public float $AliquotaIVA;
    public ?string $Natura;
    public ?string $EsigibilitaIVA;
    public float $Imposta;

    public function __construct(...$args)
    {
        $this->ImponibileImporto = $args[0];
        $this->AliquotaIVA = $args[1];

        if (isset($args[2]) && $args[2]) {
            $this->Natura = $args[2];
        } else {
            $this->EsigibilitaIVA = (isset($args[3]) && $args[3]) ? $args[3] : Settings::EsigibilitaIVADefault();
        }

        $this->Imposta = $this->ImponibileImporto * $this->AliquotaIVA / 100;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('Natura', new Choice(Settings::Natura()));
        $metadata->addPropertyConstraint('EsigibilitaIVA', new Choice(Settings::EsigibilitaIVA()));
    }
}
