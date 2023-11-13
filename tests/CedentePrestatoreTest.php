<?php

namespace Tests\Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Models\CedentePrestatore;
use PHPUnit\Framework\TestCase;
use Axiostudio\FatturaElettronica\Models\DatiAnagrafici;
use Axiostudio\FatturaElettronica\Models\Sede;

class CedentePrestatoreTest extends TestCase
{
    public function testConstructor(): void
    {
        $datiAnagraficiArgs = [];
        $sedeArgs = [];

        $cedentePrestatore = new CedentePrestatore($datiAnagraficiArgs, $sedeArgs);

        $this->assertInstanceOf(CedentePrestatore::class, $cedentePrestatore);
        $this->assertInstanceOf(DatiAnagrafici::class, $cedentePrestatore->DatiAnagrafici);
        $this->assertInstanceOf(Sede::class, $cedentePrestatore->Sede);
    }
}
