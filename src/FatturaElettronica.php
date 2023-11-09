<?php

namespace Axiostudio\FatturaElettronica;

use Axiostudio\FatturaElettronica\Handlers\Xml as XmlHandler;
use Axiostudio\FatturaElettronica\Handlers\DataDatiBeniServizi;
use Axiostudio\FatturaElettronica\Handlers\Model as ModelHandler;
use Axiostudio\FatturaElettronica\Models\FatturaElettronica as Fattura;

class FatturaElettronica
{
    use ModelHandler;
    use XmlHandler;
    use DataDatiBeniServizi;

    protected function fileName($header): string
    {
        $idPaese = (is_array($header[0][0]) && isset($header[0][0][1])) ? $header[0][0][1] : Settings::IdPaeseDefault();
        $idCodice = (is_array($header[0][0])) ? $header[0][0][0] : $header[0][0];
        $progressivoInvio = $header[0][1];

        return $idPaese . $idCodice . '_' . $progressivoInvio . '.xml';
    }

    protected function file($header, $body): string
    {
        $fattura = $this->createModel(new Fattura($header, $body), true);

        return $this->createXml($fattura);
    }

    public function create(
        array $FatturaElettronicaHeader,
        array $FatturaElettronicaBody,
        array $DettaglioLinee,
        array $DatiRiepilogo
    ): array {

        $xml = $this->file($FatturaElettronicaHeader, $FatturaElettronicaBody);
        $xml = $this->addDatiBeniServiziToXml($xml, $DettaglioLinee, $DatiRiepilogo);

        return [
            'file' => $xml,
            'fileName' => $this->fileName($FatturaElettronicaHeader)
        ];
    }
}
