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

class CedentePrestatore extends Model
{
    public DatiAnagrafici $DatiAnagrafici;
    public Sede $Sede;

    public function __construct(...$args)
    {
        $this->DatiAnagrafici = $this->createModel(new DatiAnagrafici(...$args[0]));
        $this->Sede = $this->createModel(new Sede(...$args[1]));
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void {}
}
