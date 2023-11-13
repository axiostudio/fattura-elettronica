<?php

namespace Axiostudio\FatturaElettronica\Tests;

use Axiostudio\FatturaElettronica\Models\Id;
use Axiostudio\FatturaElettronica\Settings;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

class IdTest extends TestCase
{
    public function testConstructorWithIdPaese(): void
    {
        $idCodice = 'ABC123456789';
        $idPaese = 'IT';

        $id = new Id($idCodice, $idPaese);

        $this->assertInstanceOf(Id::class, $id);
        $this->assertEquals($idCodice, $id->IdCodice);
        $this->assertEquals($idPaese, $id->IdPaese);
    }

    public function testConstructorWithoutIdPaese(): void
    {
        $idCodice = 'ABC123456789';

        $id = new Id($idCodice);

        $this->assertInstanceOf(Id::class, $id);
        $this->assertEquals($idCodice, $id->IdCodice);
        $this->assertEquals(Settings::IdPaeseDefault(), $id->IdPaese);
    }

    public function testValidation(): void
    {
        $id = new Id('ABC123456789', 'IT');

        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();

        $violations = $validator->validate($id);

        $this->assertCount(0, $violations);
    }
}
