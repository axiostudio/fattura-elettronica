<?php

namespace Axiostudio\FatturaElettronica\Handlers;

use Axiostudio\FatturaElettronica\Handlers\Xml;
use Axiostudio\FatturaElettronica\Handlers\Model;

trait DataDatiBeniServizi
{
    use Xml;
    use Model;

    public function addDatiBeniServiziToXml(string $Xml, array $DettaglioLinee = [], array $DatiRiepilogo = []): string
    {
        $DettaglioLineeBlock = '';

        foreach ($this->DettaglioLinee as $numero => $linea) {
            $data = $this->createModel(new DettaglioLinee($linea, $numero));
            $DettaglioLineeBlock .= '<DettaglioLinee>' . $this->createXmlBlock($linea) . '</DettaglioLinee>';
        }

        $DatiRiepilogoBlock = '';

        foreach ($this->DatiRiepilogo as $dato) {
            $data = $this->createModel(new DatiRiepilogo($dato));
            $DatiRiepilogoBlock .= '<DatiRiepilogo>' . $this->createXmlBlock($dato) . '</DatiRiepilogo>';
        }

        $xml = str_replace('<DataDatiBeniServizi></DataDatiBeniServizi>', $DettaglioLineeBlock . $DatiRiepilogoBlock, $Xml);

        return $xml;
    }
}
