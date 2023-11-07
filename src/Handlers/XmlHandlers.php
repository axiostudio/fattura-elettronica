<?php

namespace Axiostudio\FatturaElettronica\Handlers;

use Spatie\ArrayToXml\ArrayToXml;

trait XmlHandlers
{
    public function createXml(array $array): string
    {
        $xml = ArrayToXml::convert($array);

        return $this->updateXml($xml);
    }

    protected function updateXml(string $xml, string $version = 'FPR12'): string
    {
        $xml = str_replace('<?xml version="1.0"?>', '<v1:FatturaElettronica xmlns:v1="http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.2" versione="' . $version . '">', $xml);
        $xml = str_replace('<root>', '', $xml);
        $xml = str_replace('</root>', '</v1:FatturaElettronica>', $xml);

        return $xml;
    }
}
