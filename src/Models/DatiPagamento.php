<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Settings;
use Axiostudio\FatturaElettronica\Abstracts\Model;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class DatiPagamento extends Model
{
    public DettaglioPagamento $DettaglioPagamento;
    public ?string $CondizioniPagamento;

    public function __construct(...$args)
    {
        $this->DettaglioPagamento = $this->createModel(new DettaglioPagamento(...$args[0]));
        $this->CondizioniPagamento = (isset($args[1]) && $args[1]) ? $args[1] : Settings::CondizioniPagamentoDefault();
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('CondizioniPagamento', new Choice(Settings::CondizioniPagamento()));
    }
}
