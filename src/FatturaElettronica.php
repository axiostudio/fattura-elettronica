<?php

namespace Axiostudio\FatturaElettronica;

use Axiostudio\FatturaElettronica\Models\FatturaElettronica as Fattura;
use Axiostudio\FatturaElettronica\Handlers\Xml as XmlHandler;
use Axiostudio\FatturaElettronica\Handlers\Model as ModelHandler;

class FatturaElettronica
{
    use ModelHandler;
    use XmlHandler;

    protected function fileName($header)
    {
        $idPaese = (is_array($header[0][0]) && isset($header[0][0][1])) ? $header[0][0][1] : Settings::IdPaeseDefault();
        $idCodice = (is_array($header[0][0])) ? $header[0][0][0] : $header[0][0];
        $progressivoInvio = $header[0][1];

        return $idPaese . $idCodice . '_' . $progressivoInvio . '.xml';
    }

    public function create(
        array $FatturaElettronicaHeader,
        array $FatturaElettronicaBody
    ): array {
        return [
            'file' => $this->createModel(
                new Fattura(
                    $FatturaElettronicaHeader,
                    $FatturaElettronicaBody
                ),
                true
            ),
            'fileName' => $this->fileName($FatturaElettronicaHeader)
        ];
    }
}
