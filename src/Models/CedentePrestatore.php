<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Models\Sede;
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

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        //
    }
}
