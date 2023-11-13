<?php

namespace Axiostudio\FatturaElettronica\Tests;

use PHPUnit\Framework\TestCase;
use Axiostudio\FatturaElettronica\Models\Sede;
use Axiostudio\FatturaElettronica\Models\DatiAnagrafici;
use Axiostudio\FatturaElettronica\Models\CedentePrestatore;

class CedentePrestatoreTest extends TestCase
{
    public function testConstructor(): void
    {

        $DatiAnagrafici = ['Company Ltd', '0123456789'];
        $Sede = [
            'Via Roma, 1',
            '00100',
            'Roma',
            'RM',
            'IT'
        ];

        $cedentePrestatore = new CedentePrestatore($DatiAnagrafici, $Sede);

        $this->assertInstanceOf(CedentePrestatore::class, $cedentePrestatore);
        $this->assertInstanceOf(DatiAnagrafici::class, $cedentePrestatore->DatiAnagrafici);
        $this->assertInstanceOf(Sede::class, $cedentePrestatore->Sede);
    }
}
