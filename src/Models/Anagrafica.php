<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Abstracts\Model;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class Anagrafica extends Model
{
    public ?string $Denominazione;
    public ?string $Nome;
    public ?string $Cognome;

    public function __construct(...$args)
    {
        if (isset($args[0]) && $args[0]) {
            $this->Denominazione = $args[0];
        }

        if (isset($args[1]) && $args[1]) {
            $this->Nome = $args[1];
        }

        if (isset($args[2]) && $args[2]) {
            $this->Cognome = $args[2];
        }
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        //
    }
}
