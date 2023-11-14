<?php

namespace Axiostudio\FatturaElettronica\Tests;

use Axiostudio\FatturaElettronica\Models\DatiTrasmissione;
use Axiostudio\FatturaElettronica\Models\Id;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

class DatiTrasmissioneTest extends TestCase
{
    public function testConstructorWithEmailPECDestinatario(): void
    {
        $id = '0123456789';

        $progressivoInvio = '001';
        $codiceDestinatario = '1234567';
        $pecDestinatario = 'pec@example.com';
        $formatoTrasmissione = 'FPA12';

        $datiTrasmissione = new DatiTrasmissione($id, $progressivoInvio, $codiceDestinatario, $pecDestinatario, $formatoTrasmissione);

        $this->assertInstanceOf(DatiTrasmissione::class, $datiTrasmissione);
        $this->assertInstanceOf(Id::class, $datiTrasmissione->IdTrasmittente);
        $this->assertEquals($progressivoInvio, $datiTrasmissione->ProgressivoInvio);
        $this->assertEquals($codiceDestinatario, $datiTrasmissione->CodiceDestinatario);
        $this->assertEquals($pecDestinatario, $datiTrasmissione->PECDestinatario);
        $this->assertEquals($formatoTrasmissione, $datiTrasmissione->FormatoTrasmissione);
    }

    public function testConstructorWithoutEmailPECDestinatario(): void
    {
        $id = '0123456789';

        $progressivoInvio = '001';
        $codiceDestinatario = '1234567';
        $formatoTrasmissione = 'FPA12';

        $datiTrasmissione = new DatiTrasmissione($id, $progressivoInvio, $codiceDestinatario, null, $formatoTrasmissione);

        $this->assertInstanceOf(DatiTrasmissione::class, $datiTrasmissione);
        $this->assertInstanceOf(Id::class, $datiTrasmissione->IdTrasmittente);
        $this->assertEquals($progressivoInvio, $datiTrasmissione->ProgressivoInvio);
        $this->assertEquals($codiceDestinatario, $datiTrasmissione->CodiceDestinatario);
        $this->assertEquals($formatoTrasmissione, $datiTrasmissione->FormatoTrasmissione);
    }

    public function testValidation(): void
    {
        $id = '0123456789';

        $datiTrasmissione = new DatiTrasmissione($id, '001', '1234567', 'pec@example.com', 'FPA12');

        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();

        $violations = $validator->validate($datiTrasmissione);

        $this->assertCount(0, $violations);
    }
}
