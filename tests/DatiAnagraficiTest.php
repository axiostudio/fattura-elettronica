<?php

namespace Tests\Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Models\DatiAnagrafici;
use Axiostudio\FatturaElettronica\Models\Id;
use Axiostudio\FatturaElettronica\Models\Anagrafica;
use Axiostudio\FatturaElettronica\Settings;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

class DatiAnagraficiTest extends TestCase
{
    public function testConstructor(): void
    {
        $id = '0123456789';
        $anagrafica = ['Company Ltd', 'John', 'Doe'];

        $codiceFiscale = 'ABC123XYZ4567890';
        $regimeFiscale = 'RegimeFiscaleValue';

        $datiAnagrafici = new DatiAnagrafici($id, $anagrafica, $codiceFiscale, $regimeFiscale);

        $this->assertInstanceOf(DatiAnagrafici::class, $datiAnagrafici);
        $this->assertInstanceOf(Id::class, $datiAnagrafici->IdFiscaleIVA);
        $this->assertInstanceOf(Anagrafica::class, $datiAnagrafici->Anagrafica);
        $this->assertEquals($codiceFiscale, $datiAnagrafici->CodiceFiscale);
        $this->assertEquals($regimeFiscale, $datiAnagrafici->RegimeFiscale);
    }
}
