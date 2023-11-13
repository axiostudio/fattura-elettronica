<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Abstracts\Model;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Axiostudio\FatturaElettronica\Models\DatiGeneraliDocumento;

class DatiGenerali extends Model
{
    public DatiGeneraliDocumento $DatiGeneraliDocumento;

    public function __construct(...$args)
    {
        $this->DatiGeneraliDocumento = $this->createModel(new DatiGeneraliDocumento(...$args[0]));
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        //
    }
}
