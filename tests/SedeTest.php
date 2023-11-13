<?php

namespace Axiostudio\FatturaElettronica\Tests;

use Axiostudio\FatturaElettronica\Models\Sede;
use Axiostudio\FatturaElettronica\Settings;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

class SedeTest extends TestCase
{
    public function testConstructorWithProvinciaAndNazione(): void
    {
        $indirizzo = 'Via Example, 123';
        $cap = '12345';
        $comune = 'Example City';
        $provincia = 'EX';
        $nazione = 'IT';

        $sede = new Sede($indirizzo, $cap, $comune, $provincia, $nazione);

        $this->assertInstanceOf(Sede::class, $sede);
        $this->assertEquals($indirizzo, $sede->Indirizzo);
        $this->assertEquals($cap, $sede->CAP);
        $this->assertEquals($comune, $sede->Comune);
        $this->assertEquals($provincia, $sede->Provincia);
        $this->assertEquals($nazione, $sede->Nazione);
    }

    public function testConstructorWithoutProvinciaAndNazione(): void
    {
        $indirizzo = 'Via Example, 123';
        $cap = '12345';
        $comune = 'Example City';

        $sede = new Sede($indirizzo, $cap, $comune);

        $this->assertInstanceOf(Sede::class, $sede);
        $this->assertEquals($indirizzo, $sede->Indirizzo);
        $this->assertEquals($cap, $sede->CAP);
        $this->assertEquals($comune, $sede->Comune);
        $this->assertNull($sede->Provincia);
        $this->assertEquals(Settings::IdPaeseDefault(), $sede->Nazione);
    }

    public function testValidation(): void
    {
        $sede = new Sede('Via Example, 123', '12345', 'Example City', 'EX', 'IT');

        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();

        $violations = $validator->validate($sede);

        $this->assertCount(0, $violations);
    }
}
