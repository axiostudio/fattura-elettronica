<?php

namespace Axiostudio\FatturaElettronica\Handlers;

use Axiostudio\FatturaElettronica\Handlers\Xml;
use Axiostudio\FatturaElettronica\Handlers\Model;
use Axiostudio\FatturaElettronica\Models\DatiRiepilogo;
use Axiostudio\FatturaElettronica\Models\DettaglioLinee;

trait DataDatiBeniServizi
{
    use Xml;
    use Model;

    public function addDatiBeniServiziToXml(string $Xml, array $DettaglioLinee = [], array $DatiRiepilogo = []): string
    {
        $DettaglioLineeBlock = '';

        foreach ($DettaglioLinee as $numero => $linea) {
            $data = $this->createModel(new DettaglioLinee(...$linea), true);
            $data['NumeroLinea'] = $numero + 1;
            $DettaglioLineeBlock .= '<DettaglioLinee>' . $this->createXmlBlock($data) . '</DettaglioLinee>';
        }

        $DatiRiepilogoBlock = '';

        foreach ($DatiRiepilogo as $dato) {
            $data = $this->createModel(new DatiRiepilogo(...$dato), true);
            $DatiRiepilogoBlock .= '<DatiRiepilogo>' . $this->createXmlBlock($data) . '</DatiRiepilogo>';
        }

        $xml = str_replace('<DataDatiBeniServizi></DataDatiBeniServizi>', $DettaglioLineeBlock . $DatiRiepilogoBlock, $Xml);

        return $xml;
    }
}
