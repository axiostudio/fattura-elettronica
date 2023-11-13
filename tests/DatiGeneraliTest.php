<?php

namespace Axiostudio\FatturaElettronica\Tests;

use Axiostudio\FatturaElettronica\Models\DatiGenerali;
use Axiostudio\FatturaElettronica\Models\DatiGeneraliDocumento;
use PHPUnit\Framework\TestCase;

class DatiGeneraliTest extends TestCase
{
    public function testConstructor(): void
    {
        $datiGeneraliDocumento = [
            '1',
            '2019-01-01',
            '100.00',
        ];

        $datiGenerali = new DatiGenerali($datiGeneraliDocumento);

        $this->assertInstanceOf(DatiGenerali::class, $datiGenerali);
        $this->assertInstanceOf(DatiGeneraliDocumento::class, $datiGenerali->DatiGeneraliDocumento);
    }
}
