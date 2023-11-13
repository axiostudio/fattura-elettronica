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

use Axiostudio\FatturaElettronica\Models\DatiRiepilogo;
use Axiostudio\FatturaElettronica\Models\DettaglioLinee;

trait XmlDatiBeniServizi
{
    use Model;
    use Xml;

    public function addDatiBeniServiziToXml(string $Xml, array $DettaglioLinee = [], array $DatiRiepilogo = []): string
    {
        $DettaglioLineeBlock = '';

        foreach ($DettaglioLinee as $numero => $linea) {
            $data = $this->createModel(new DettaglioLinee(...$linea), true);
            $data['NumeroLinea'] = $numero + 1;
            $DettaglioLineeBlock .= '<DettaglioLinee>'.$this->createXmlBlock($data).'</DettaglioLinee>';
        }

        $DatiRiepilogoBlock = '';

        foreach ($DatiRiepilogo as $dato) {
            $data = $this->createModel(new DatiRiepilogo(...$dato), true);
            $DatiRiepilogoBlock .= '<DatiRiepilogo>'.$this->createXmlBlock($data).'</DatiRiepilogo>';
        }

        return str_replace('<XmlDatiBeniServizi></XmlDatiBeniServizi>', $DettaglioLineeBlock.$DatiRiepilogoBlock, $Xml);
    }
}
