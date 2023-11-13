<?php

namespace Axiostudio\FatturaElettronica\Tests;

use Axiostudio\FatturaElettronica\Models\DettaglioPagamento;
use Axiostudio\FatturaElettronica\Models\DatiPagamento;
use Axiostudio\FatturaElettronica\Settings;
use PHPUnit\Framework\TestCase;

class DatiPagamentoTest extends TestCase
{
    public function testConstructor(): void
    {
        $dettaglioPagamento = [100.00];

        $datiPagamento = new DatiPagamento($dettaglioPagamento);

        $this->assertInstanceOf(DatiPagamento::class, $datiPagamento);
        $this->assertInstanceOf(DettaglioPagamento::class, $datiPagamento->DettaglioPagamento);
        $this->assertEquals(Settings::CondizioniPagamentoDefault(), $datiPagamento->CondizioniPagamento);
    }
}
