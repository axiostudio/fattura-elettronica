<?php

namespace Axiostudio\FatturaElettronica\Tests;

use Axiostudio\FatturaElettronica\Models\Anagrafica;
use PHPUnit\Framework\TestCase;

class AnagraficaTest extends TestCase
{
    public function testConstructor(): void
    {
        $denominazione = 'Company';
        $nome = 'John';
        $cognome = 'Doe';

        $anagrafica = new Anagrafica($denominazione, $nome, $cognome);

        $this->assertInstanceOf(Anagrafica::class, $anagrafica);
        $this->assertEquals($denominazione, $anagrafica->Denominazione);
        $this->assertEquals($nome, $anagrafica->Nome);
        $this->assertEquals($cognome, $anagrafica->Cognome);
    }
}
