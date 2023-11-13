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

class DatiPagamento extends Model
{
    public DettaglioPagamento $DettaglioPagamento;
    public ?string $CondizioniPagamento;

    public function __construct(...$args)
    {
        $this->DettaglioPagamento = $this->createModel(new DettaglioPagamento(...$args[0]));
        $this->CondizioniPagamento = (isset($args[1]) && $args[1]) ? $args[1] : Settings::CondizioniPagamentoDefault();
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('CondizioniPagamento', new Choice(Settings::CondizioniPagamento()));
    }
}
