<?php

namespace Axiostudio\FatturaElettronica\Tests;

use Axiostudio\FatturaElettronica\Models\DatiGeneraliDocumento;
use Axiostudio\FatturaElettronica\Settings;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

class DatiGeneraliDocumentoTest extends TestCase
{
    public function testConstructor(): void
    {
        $numero = '123';
        $data = '2023-11-13';
        $importoTotaleDocumento = 123.45;

        $datiGeneraliDocumento = new DatiGeneraliDocumento($numero, $data, $importoTotaleDocumento);

        $this->assertInstanceOf(DatiGeneraliDocumento::class, $datiGeneraliDocumento);
        $this->assertEquals($numero, $datiGeneraliDocumento->Numero);
        $this->assertEquals($data, $datiGeneraliDocumento->Data);
        $this->assertEquals($importoTotaleDocumento, $datiGeneraliDocumento->ImportoTotaleDocumento);
        $this->assertEquals(Settings::CausaleDefault(), $datiGeneraliDocumento->Causale);
        $this->assertEquals(Settings::TipoDocumentoDefault(), $datiGeneraliDocumento->TipoDocumento);
        $this->assertEquals(Settings::ValutaDefault(), $datiGeneraliDocumento->Divisa);
    }

    public function testValidation(): void
    {
        $datiGeneraliDocumento = new DatiGeneraliDocumento('123', '2023-11-13', 123.45);

        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();

        $violations = $validator->validate($datiGeneraliDocumento);

        $this->assertCount(0, $violations);
    }
}
