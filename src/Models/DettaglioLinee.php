<?php

declare(strict_types=1);

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 * Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Abstracts\Model;
use Axiostudio\FatturaElettronica\Settings;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class DettaglioLinee extends Model
{
    public string $Descrizione;
    public float $PrezzoUnitario;
    public ?float $Quantita;
    public ?string $UnitaMisura;
    public ?float $AliquotaIVA;
    public ?string $Natura;
    public ?float $PrezzoTotale;

    public function __construct(...$args)
    {
        $this->Descrizione = $args[0];
        $this->PrezzoUnitario = $args[1];
        $this->Quantita = (isset($args[2]) && $args[2]) ? $args[2] : Settings::QuantitaDefault();
        $this->UnitaMisura = (isset($args[3]) && $args[3]) ? $args[3] : Settings::UnitaMisuraDefault();
        $this->AliquotaIVA = (isset($args[4]) && $args[4]) ? $args[4] : Settings::AliquotaIVADefault();
        $this->PrezzoTotale = $this->PrezzoUnitario * $this->Quantita;

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
