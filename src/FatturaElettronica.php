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

namespace Axiostudio\FatturaElettronica;

use Axiostudio\FatturaElettronica\Handlers\Model as ModelHandler;
use Axiostudio\FatturaElettronica\Handlers\Xml as XmlHandler;
use Axiostudio\FatturaElettronica\Handlers\XmlDatiBeniServizi as DatiBeniServiziHandler;
use Axiostudio\FatturaElettronica\Models\FatturaElettronica as Fattura;

class FatturaElettronica
{
    use DatiBeniServiziHandler;
    use ModelHandler;
    use XmlHandler;

    public function compose(
        array $FatturaElettronicaHeader,
        array $FatturaElettronicaBody,
        array $DettaglioLinee,
        array $DatiRiepilogo
    ): array {
        return $this->create(
            $FatturaElettronicaHeader,
            $FatturaElettronicaBody,
            $DettaglioLinee,
            $DatiRiepilogo
        );
    }

    protected function fileName($header): string
    {
        $idPaese = (\is_array($header[0][0]) && isset($header[0][0][1])) ? $header[0][0][1] : Settings::IdPaeseDefault();
        $idCodice = (\is_array($header[0][0])) ? $header[0][0][0] : $header[0][0];
        $progressivoInvio = $header[0][1];

        return $idPaese.$idCodice.'_'.$progressivoInvio.'.xml';
    }

    protected function fileContent($header, $body): string
    {
        $fattura = $this->createModel(new Fattura($header, $body), true);

        return $this->createXml($fattura);
    }

    protected function create(
        array $FatturaElettronicaHeader,
        array $FatturaElettronicaBody,
        array $DettaglioLinee,
        array $DatiRiepilogo
    ): array {
        $xmlContent = $this->fileContent($FatturaElettronicaHeader, $FatturaElettronicaBody);
        $xmlContent = $this->addDatiBeniServiziToXml($xmlContent, $DettaglioLinee, $DatiRiepilogo);

        return [
            'fileContent' => $xmlContent,
            'fileName' => $this->fileName($FatturaElettronicaHeader),
        ];
    }
}
