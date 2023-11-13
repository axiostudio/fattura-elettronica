<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Abstracts\Model;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class FatturaElettronicaHeader extends Model
{
    public DatiTrasmissione $DatiTrasmissione;
    public CedentePrestatore $CedentePrestatore;
    public CessionarioCommittente $CessionarioCommittente;

    public function __construct(...$args)
    {
        $this->DatiTrasmissione = $this->createModel(new DatiTrasmissione(...$args[0]));
        $this->CedentePrestatore = $this->createModel(new CedentePrestatore(...$args[1]));
        $this->CessionarioCommittente = $this->createModel(new CessionarioCommittente(...$args[2]));
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        //
    }
}
