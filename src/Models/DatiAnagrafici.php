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
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class DatiAnagrafici extends Model
{
    public Id $IdFiscaleIVA;
    public Anagrafica $Anagrafica;
    public ?string $CodiceFiscale;
    public ?string $RegimeFiscale;

    public function __construct(...$args)
    {
        $this->IdFiscaleIVA = \is_array($args[0]) ?
            $this->createModel(new Id(...$args[0])) :
            $this->createModel(new Id($args[0]));

        $this->Anagrafica = \is_array($args[1]) ?
            $this->createModel(new Anagrafica(...$args[1])) :
            $this->createModel(new Anagrafica($args[1]));

        if (isset($args[2]) && $args[2]) {
            $this->CodiceFiscale = $args[2];
        }

        $this->RegimeFiscale = (isset($args[3]) && $args[3]) ? $args[3] : Settings::RegimeFiscaleDefault();
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('CodiceFiscale', new Length(null, 8, 16));
        $metadata->addPropertyConstraint('RegimeFiscale', new Choice(Settings::RegimeFiscale()));
    }
}
