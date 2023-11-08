<?php

namespace Axiostudio\FatturaElettronica;

class FatturaElettronica
{
    use \Axiostudio\FatturaElettronica\Handlers\ModelHandlers;
    use \Axiostudio\FatturaElettronica\Handlers\XmlHandlers;

    public function header(array $datiTrasmissione,  array $cedentePrestatore, array $cessionarioCommittente): array
    {
        return [
            'DatiTrasmissione' => $this->createModel(new Models\DatiTrasmissione(...$datiTrasmissione), true),
            'CedentePrestatore' => $this->createModel(new Models\CedentePrestatore(...$cedentePrestatore), true),
            'CessionarioCommittente' => $this->createModel(new Models\CessionarioCommittente(...$cessionarioCommittente), true),
        ];
    }
}
