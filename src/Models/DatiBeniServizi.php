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

class DatiBeniServizi extends Model
{
    public $XmlDatiBeniServizi;

    public function __construct(...$args)
    {
        // Data will be managed into XmlDatiBeniServizi Handler
        $this->XmlDatiBeniServizi = null;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void {}
}
