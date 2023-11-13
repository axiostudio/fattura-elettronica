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

use Axiostudio\FatturaElettronica\Models\Id;
use Axiostudio\FatturaElettronica\Settings;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

/**
 * @internal
 *
 * @coversNothing
 */
final class IdTest extends TestCase
{
    public function testConstructorWithIdPaese(): void
    {
        $idCodice = 'ABC123456789';
        $idPaese = 'IT';

        $id = new Id($idCodice, $idPaese);

        self::assertInstanceOf(Id::class, $id);
        self::assertSame($idCodice, $id->IdCodice);
        self::assertSame($idPaese, $id->IdPaese);
    }

    public function testConstructorWithoutIdPaese(): void
    {
        $idCodice = 'ABC123456789';

        $id = new Id($idCodice);

        self::assertInstanceOf(Id::class, $id);
        self::assertSame($idCodice, $id->IdCodice);
        self::assertSame(Settings::IdPaeseDefault(), $id->IdPaese);
    }

    public function testValidation(): void
    {
        $id = new Id('ABC123456789', 'IT');

        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();

        $violations = $validator->validate($id);

        self::assertCount(0, $violations);
    }
}
