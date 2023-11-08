<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Abstracts\Model;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class FatturaElettronicaBody extends Model
{
    public DatiGenerali $DatiGenerali;

    public function __construct(...$args)
    {
        $this->DatiGenerali = $this->createModel(new DatiGenerali(...$args[0]));
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        //
    }
}
