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
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class Id extends Model
{
    public string $IdCodice;
    public ?string $IdPaese;

    public function __construct(...$args)
    {
        $this->IdCodice = $args[0];
        $this->IdPaese = (isset($args[1]) && $args[1]) ? $args[1] : Settings::IdPaeseDefault();
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('IdCodice', new Length(null, 9, 11));
        $metadata->addPropertyConstraint('IdPaese', new Length(2));
    }
}
