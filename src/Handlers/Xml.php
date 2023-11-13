<?php

declare(strict_types=1);

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 * Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Axiostudio\FatturaElettronica\Handlers;

use Axiostudio\FatturaElettronica\Settings;
use Spatie\ArrayToXml\ArrayToXml;

trait Xml
{
    public function createXml(array $array): string
    {
        $xml = ArrayToXml::convert($array);

        return $this->updateXml($xml);
    }

    public function createXmlBlock(array $array): string
    {
        $xml = ArrayToXml::convert($array);

        return $this->updateXmlBlock($xml);
    }

    protected function updateXml(string $xml): string
    {
        $xml = str_replace('<?xml version="1.0"?>', Settings::XmlStart(), $xml);
        $xml = str_replace('<root>', '', $xml);

        return str_replace('</root>', Settings::XmlEnd(), $xml);
    }

    protected function updateXmlBlock(string $xml): string
    {
        $xml = str_replace('<?xml version="1.0"?>', '', $xml);
        $xml = str_replace('<root>', '', $xml);

        return str_replace('</root>', '', $xml);
    }
}
