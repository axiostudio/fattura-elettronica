<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Abstracts\Model;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Axiostudio\FatturaElettronica\Models\DatiPagamento;
use Axiostudio\FatturaElettronica\Models\DatiBeniServizi;

class FatturaElettronicaBody extends Model
{
    public DatiGenerali $DatiGenerali;
    public DatiPagamento $DatiPagamento;
    public DatiBeniServizi $DatiBeniServizi;

    public function __construct(...$args)
    {
        $this->DatiGenerali = $this->createModel(new DatiGenerali(...$args[0]));
        $this->DatiPagamento = $this->createModel(new DatiPagamento(...$args[1]));
        $this->DatiBeniServizi = $this->createModel(new DatiBeniServizi([]));
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        //
    }
}
