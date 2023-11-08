<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Models\Model;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class Id extends Model
{
    public string $IdCodice;
    public ?string $IdPaese;

    public function __construct(...$args)
    {
        $this->IdCodice = $args[0];
        $this->IdPaese = (isset($args[1]) && $args[1]) ? $args[1] : 'IT';
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('IdCodice', new Length(null, 9, 11));
        $metadata->addPropertyConstraint('IdPaese', new Length(2));
    }
}
