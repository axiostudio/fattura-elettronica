<?php

namespace Axiostudio\FatturaElettronica;

use Axiostudio\FatturaElettronica\Models\FatturaElettronica as Fattura;
use Axiostudio\FatturaElettronica\Handlers\Xml as XmlHandler;
use Axiostudio\FatturaElettronica\Handlers\Model as ModelHandler;

class FatturaElettronica
{
    use ModelHandler;
    use XmlHandler;

    public function create(array $data): array
    {
        return $this->createModel(
            new Fattura($data),
            true
        );
    }
}
