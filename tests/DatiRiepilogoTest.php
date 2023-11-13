<?php

namespace Axiostudio\FatturaElettronica\Tests;

use Axiostudio\FatturaElettronica\Models\DatiRiepilogo;
use PHPUnit\Framework\TestCase;

class DatiRiepilogoTest extends TestCase
{
    public function testConstructorWithNatura(): void
    {
        $imponibileImporto = 100.00;
        $aliquotaIVA = 22.00;
        $natura = 'N1';

        $datiRiepilogo = new DatiRiepilogo($imponibileImporto, $aliquotaIVA, $natura);

        $this->assertInstanceOf(DatiRiepilogo::class, $datiRiepilogo);
        $this->assertEquals($imponibileImporto, $datiRiepilogo->ImponibileImporto);
        $this->assertEquals($aliquotaIVA, $datiRiepilogo->AliquotaIVA);
        $this->assertEquals($natura, $datiRiepilogo->Natura);
        $this->assertEquals($imponibileImporto * $aliquotaIVA / 100, $datiRiepilogo->Imposta);
    }
}
