<?php

namespace Axiostudio\FatturaElettronica\Tests;

use Axiostudio\FatturaElettronica\Models\DettaglioLinee;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

class DettaglioLineeTest extends TestCase
{
    public function testConstructorWithNatura(): void
    {
        $descrizione = 'Product Description';
        $prezzoUnitario = 10.00;
        $quantita = 2.5;
        $unitaMisura = 'PCE';
        $aliquotaIVA = 22.00;
        $natura = 'N1';

        $dettaglioLinee = new DettaglioLinee($descrizione, $prezzoUnitario, $quantita, $unitaMisura, $aliquotaIVA, $natura);

        $this->assertInstanceOf(DettaglioLinee::class, $dettaglioLinee);
        $this->assertEquals($descrizione, $dettaglioLinee->Descrizione);
        $this->assertEquals($prezzoUnitario, $dettaglioLinee->PrezzoUnitario);
        $this->assertEquals($quantita, $dettaglioLinee->Quantita);
        $this->assertEquals($unitaMisura, $dettaglioLinee->UnitaMisura);
        $this->assertEquals($aliquotaIVA, $dettaglioLinee->AliquotaIVA);
        $this->assertEquals($prezzoUnitario * $quantita, $dettaglioLinee->PrezzoTotale);
        $this->assertEquals($natura, $dettaglioLinee->Natura);
    }

    public function testConstructorWithoutNatura(): void
    {
        $descrizione = 'Product Description';
        $prezzoUnitario = 10.00;
        $quantita = 2.5;
        $unitaMisura = 'PCE';
        $aliquotaIVA = 22.00;

        $dettaglioLinee = new DettaglioLinee($descrizione, $prezzoUnitario, $quantita, $unitaMisura, $aliquotaIVA);

        $this->assertInstanceOf(DettaglioLinee::class, $dettaglioLinee);
        $this->assertEquals($descrizione, $dettaglioLinee->Descrizione);
        $this->assertEquals($prezzoUnitario, $dettaglioLinee->PrezzoUnitario);
        $this->assertEquals($quantita, $dettaglioLinee->Quantita);
        $this->assertEquals($unitaMisura, $dettaglioLinee->UnitaMisura);
        $this->assertEquals($aliquotaIVA, $dettaglioLinee->AliquotaIVA);
        $this->assertEquals($prezzoUnitario * $quantita, $dettaglioLinee->PrezzoTotale);
    }

    public function testValidation(): void
    {
        $dettaglioLinee = new DettaglioLinee('Product Description', 10.00, 2.5, 'PCE', 22.00);

        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();

        $violations = $validator->validate($dettaglioLinee);

        $this->assertCount(0, $violations);
    }
}
