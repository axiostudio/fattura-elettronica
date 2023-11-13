<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Abstracts\Model;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class DatiBeniServizi extends Model
{
    public $XmlDatiBeniServizi;

    public function __construct(...$args)
    {
        // Data will be managed into XmlDatiBeniServizi Handler
        $this->XmlDatiBeniServizi = null;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        //
    }
}
