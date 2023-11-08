<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Abstracts\Model;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class DatiBeniServizi extends Model
{
    public $DataDatiBeniServizi;

    public function __construct(...$args)
    {
        // Data will be replaced in the main Class
        $this->DataDatiBeniServizi = null;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        //
    }
}
