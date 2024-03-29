<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Settings;
use Axiostudio\FatturaElettronica\Abstracts\Model;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class Id extends Model
{
    public ?string $IdCodice;
    public ?string $IdPaese;

    public function __construct(...$args)
    {
        $this->IdCodice = $args[0];
        $this->IdPaese = (isset($args[1]) && $args[1]) ? $args[1] : Settings::IdPaeseDefault();
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('IdCodice', new Length(null, 7, 13));
        $metadata->addPropertyConstraint('IdPaese', new Length(2));
    }
}
