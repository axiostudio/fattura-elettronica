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

use Axiostudio\FatturaElettronica\Models\Sede;
use Axiostudio\FatturaElettronica\Settings;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

/**
 * @internal
 *
 * @coversNothing
 */
final class SedeTest extends TestCase
{
    public function testConstructorWithProvinciaAndNazione(): void
    {
        $indirizzo = 'Via Example, 123';
        $cap = '12345';
        $comune = 'Example City';
        $provincia = 'EX';
        $nazione = 'IT';

        $sede = new Sede($indirizzo, $cap, $comune, $provincia, $nazione);

        self::assertInstanceOf(Sede::class, $sede);
        self::assertSame($indirizzo, $sede->Indirizzo);
        self::assertSame($cap, $sede->CAP);
        self::assertSame($comune, $sede->Comune);
        self::assertSame($provincia, $sede->Provincia);
        self::assertSame($nazione, $sede->Nazione);
    }

    public function testConstructorWithoutProvinciaAndNazione(): void
    {
        $indirizzo = 'Via Example, 123';
        $cap = '12345';
        $comune = 'Example City';

        $sede = new Sede($indirizzo, $cap, $comune);

        self::assertInstanceOf(Sede::class, $sede);
        self::assertSame($indirizzo, $sede->Indirizzo);
        self::assertSame($cap, $sede->CAP);
        self::assertSame($comune, $sede->Comune);
        self::assertNull($sede->Provincia);
        self::assertSame(Settings::IdPaeseDefault(), $sede->Nazione);
    }

    public function testValidation(): void
    {
        $sede = new Sede('Via Example, 123', '12345', 'Example City', 'EX', 'IT');

        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();

        $violations = $validator->validate($sede);

        self::assertCount(0, $violations);
    }
}
