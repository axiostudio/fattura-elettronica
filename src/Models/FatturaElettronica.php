<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Abstracts\Model;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Axiostudio\FatturaElettronica\Models\FatturaElettronicaBody;

class FatturaElettronica extends Model
{
    public FatturaElettronicaHeader $FatturaElettronicaHeader;
    public FatturaElettronicaBody $FatturaElettronicaBody;

    public function __construct(...$args)
    {
        $this->FatturaElettronicaHeader = $this->createModel(new FatturaElettronicaHeader(...$args[0]));
        $this->FatturaElettronicaBody = $this->createModel(new FatturaElettronicaBody(...$args[1]));
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        //
    }
}
