<?php

declare(strict_types=1);

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 * Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Axiostudio\FatturaElettronica\Tests;

use Axiostudio\FatturaElettronica\Models\DettaglioLinee;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

/**
 * @internal
 *
 * @coversNothing
 */
final class DettaglioLineeTest extends TestCase
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

        self::assertInstanceOf(DettaglioLinee::class, $dettaglioLinee);
        self::assertSame($descrizione, $dettaglioLinee->Descrizione);
        self::assertSame($prezzoUnitario, $dettaglioLinee->PrezzoUnitario);
        self::assertSame($quantita, $dettaglioLinee->Quantita);
        self::assertSame($unitaMisura, $dettaglioLinee->UnitaMisura);
        self::assertSame($aliquotaIVA, $dettaglioLinee->AliquotaIVA);
        self::assertSame($prezzoUnitario * $quantita, $dettaglioLinee->PrezzoTotale);
        self::assertSame($natura, $dettaglioLinee->Natura);
    }

    public function testConstructorWithoutNatura(): void
    {
        $descrizione = 'Product Description';
        $prezzoUnitario = 10.00;
        $quantita = 2.5;
        $unitaMisura = 'PCE';
        $aliquotaIVA = 22.00;

        $dettaglioLinee = new DettaglioLinee($descrizione, $prezzoUnitario, $quantita, $unitaMisura, $aliquotaIVA);

        self::assertInstanceOf(DettaglioLinee::class, $dettaglioLinee);
        self::assertSame($descrizione, $dettaglioLinee->Descrizione);
        self::assertSame($prezzoUnitario, $dettaglioLinee->PrezzoUnitario);
        self::assertSame($quantita, $dettaglioLinee->Quantita);
        self::assertSame($unitaMisura, $dettaglioLinee->UnitaMisura);
        self::assertSame($aliquotaIVA, $dettaglioLinee->AliquotaIVA);
        self::assertSame($prezzoUnitario * $quantita, $dettaglioLinee->PrezzoTotale);
    }

    public function testValidation(): void
    {
        $dettaglioLinee = new DettaglioLinee('Product Description', 10.00, 2.5, 'PCE', 22.00);

        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();

        $violations = $validator->validate($dettaglioLinee);

        self::assertCount(0, $violations);
    }
}
