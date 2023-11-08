<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Contracts\Model;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Axiostudio\FatturaElettronica\Handlers\ModelHandlers;

class CessionarioCommittente implements Model
{
    use ModelHandlers;

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
