<?php

namespace Axiostudio\FatturaElettronica;

use Axiostudio\FatturaElettronica\Models\DatiTrasmissione;
use Axiostudio\FatturaElettronica\Models\CedentePrestatore;
use Axiostudio\FatturaElettronica\Models\CessionarioCommittente;
use Axiostudio\FatturaElettronica\Handlers\Model as ModelHandler;
use Axiostudio\FatturaElettronica\Handlers\Xml as XmlHandler;

class FatturaElettronica
{
    use ModelHandler;
    use XmlHandler;

    public function header(array $datiTrasmissione,  array $cedentePrestatore, array $cessionarioCommittente): array
    {
        return [
            'DatiTrasmissione' => $this->createModel(new DatiTrasmissione(...$datiTrasmissione), true),
            'CedentePrestatore' => $this->createModel(new CedentePrestatore(...$cedentePrestatore), true),
            'CessionarioCommittente' => $this->createModel(new CessionarioCommittente(...$cessionarioCommittente), true),
        ];
    }

    public function body(): array
    {
        return [];
    }
}
