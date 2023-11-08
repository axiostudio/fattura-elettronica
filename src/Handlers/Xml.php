<?php

namespace Axiostudio\FatturaElettronica\Handlers;

use Spatie\ArrayToXml\ArrayToXml;
use Axiostudio\FatturaElettronica\Settings;

trait Xml
{
    public function createXml(array $array): string
    {
        $xml = ArrayToXml::convert($array);

        return $this->updateXml($xml);
    }

    protected function updateXml(string $xml): string
    {
        $xml = str_replace('<?xml version="1.0"?>', Settings::XmlStart(), $xml);
        $xml = str_replace('<root>', '', $xml);
        $xml = str_replace('</root>', Settings::XmlEnd(), $xml);

        return $xml;
    }
}
