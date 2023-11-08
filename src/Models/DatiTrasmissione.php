<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Contracts\Model;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Axiostudio\FatturaElettronica\Handlers\ModelHandlers;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Axiostudio\FatturaElettronica\Models\Id;

class DatiTrasmissione implements Model
{
    use ModelHandlers;

    public Id $IdTrasmittente;
    public string $ProgressivoInvio;
    public ?string $FormatoTrasmissione;
    public ?string $CodiceDestinatario;

    public function __construct(...$args)
    {
        $this->IdTrasmittente = is_array($args[0]) ?
            $this->createModel(new Id($args[0][0], $args[0][1])) :
            $this->createModel(new Id($args[0]));

        $this->ProgressivoInvio = $args[1];
        $this->FormatoTrasmissione = $args[2] ?? 'FPR12';
        $this->CodiceDestinatario = $args[3] ?? '0000000';
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('FormatoTrasmissione', new Choice(['FPA12', 'FPR12']));
        $metadata->addPropertyConstraint('CodiceDestinatario', new Length(null, 6, 7));
    }
}
