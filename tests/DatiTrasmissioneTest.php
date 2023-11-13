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

use Axiostudio\FatturaElettronica\Models\DatiTrasmissione;
use Axiostudio\FatturaElettronica\Models\Id;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

/**
 * @internal
 *
 * @coversNothing
 */
final class DatiTrasmissioneTest extends TestCase
{
    public function testConstructorWithEmailPECDestinatario(): void
    {
        $id = '0123456789';

        $progressivoInvio = '001';
        $codiceDestinatario = '1234567';
        $pecDestinatario = 'pec@example.com';
        $formatoTrasmissione = 'FPA12';

        $datiTrasmissione = new DatiTrasmissione($id, $progressivoInvio, $codiceDestinatario, $pecDestinatario, $formatoTrasmissione);

        self::assertInstanceOf(DatiTrasmissione::class, $datiTrasmissione);
        self::assertInstanceOf(Id::class, $datiTrasmissione->IdTrasmittente);
        self::assertSame($progressivoInvio, $datiTrasmissione->ProgressivoInvio);
        self::assertSame($codiceDestinatario, $datiTrasmissione->CodiceDestinatario);
        self::assertSame($pecDestinatario, $datiTrasmissione->PECDestinatario);
        self::assertSame($formatoTrasmissione, $datiTrasmissione->FormatoTrasmissione);
    }

    public function testConstructorWithoutEmailPECDestinatario(): void
    {
        $id = '0123456789';

        $progressivoInvio = '001';
        $codiceDestinatario = '1234567';
        $formatoTrasmissione = 'FPA12';

        $datiTrasmissione = new DatiTrasmissione($id, $progressivoInvio, $codiceDestinatario, null, $formatoTrasmissione);

        self::assertInstanceOf(DatiTrasmissione::class, $datiTrasmissione);
        self::assertInstanceOf(Id::class, $datiTrasmissione->IdTrasmittente);
        self::assertSame($progressivoInvio, $datiTrasmissione->ProgressivoInvio);
        self::assertSame($codiceDestinatario, $datiTrasmissione->CodiceDestinatario);
        self::assertSame($formatoTrasmissione, $datiTrasmissione->FormatoTrasmissione);
    }

    public function testValidation(): void
    {
        $id = '0123456789';

        $datiTrasmissione = new DatiTrasmissione($id, '001', '1234567', 'pec@example.com', 'FPA12');

        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();

        $violations = $validator->validate($datiTrasmissione);

        self::assertCount(0, $violations);
    }
}
