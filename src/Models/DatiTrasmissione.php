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
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class DatiTrasmissione extends Model
{
    public Id $IdTrasmittente;
    public string $ProgressivoInvio;
    public ?string $CodiceDestinatario;
    public ?string $PECDestinatario;
    public ?string $FormatoTrasmissione;

    public function __construct(...$args)
    {
        $this->IdTrasmittente = \is_array($args[0]) ?
            $this->createModel(new Id($args[0][0], $args[0][1])) :
            $this->createModel(new Id($args[0]));

        $this->ProgressivoInvio = $args[1];
        $this->CodiceDestinatario = (isset($args[2]) && $args[2]) ? $args[2] : Settings::CodiceDestinatarioDefault();

        if (isset($args[3]) && $args[3]) {
            $this->PECDestinatario = $args[3];
        }

        $this->FormatoTrasmissione = (isset($args[4]) && $args[4]) ? $args[4] : Settings::FormatoTrasmissioneDefault();
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('FormatoTrasmissione', new Choice(Settings::FormatoTrasmissione()));
        $metadata->addPropertyConstraint('CodiceDestinatario', new Length(null, 6, 7));
        $metadata->addPropertyConstraint('PECDestinatario', new Email());
    }
}
