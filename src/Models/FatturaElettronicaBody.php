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
use Symfony\Component\Validator\Mapping\ClassMetadata;

class FatturaElettronicaBody extends Model
{
    public DatiGenerali $DatiGenerali;
    public DatiPagamento $DatiPagamento;
    public DatiBeniServizi $DatiBeniServizi;

    public function __construct(...$args)
    {
        $this->DatiGenerali = $this->createModel(new DatiGenerali(...$args[0]));
        $this->DatiPagamento = $this->createModel(new DatiPagamento(...$args[1]));
        $this->DatiBeniServizi = $this->createModel(new DatiBeniServizi([]));
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void {}
}
