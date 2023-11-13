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

use Axiostudio\FatturaElettronica\Models\DatiGeneraliDocumento;
use Axiostudio\FatturaElettronica\Settings;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

/**
 * @internal
 *
 * @coversNothing
 */
final class DatiGeneraliDocumentoTest extends TestCase
{
    public function testConstructor(): void
    {
        $numero = '123';
        $data = '2023-11-13';
        $importoTotaleDocumento = 123.45;

        $datiGeneraliDocumento = new DatiGeneraliDocumento($numero, $data, $importoTotaleDocumento);

        self::assertInstanceOf(DatiGeneraliDocumento::class, $datiGeneraliDocumento);
        self::assertSame($numero, $datiGeneraliDocumento->Numero);
        self::assertSame($data, $datiGeneraliDocumento->Data);
        self::assertSame($importoTotaleDocumento, $datiGeneraliDocumento->ImportoTotaleDocumento);
        self::assertSame(Settings::CausaleDefault(), $datiGeneraliDocumento->Causale);
        self::assertSame(Settings::TipoDocumentoDefault(), $datiGeneraliDocumento->TipoDocumento);
        self::assertSame(Settings::ValutaDefault(), $datiGeneraliDocumento->Divisa);
    }

    public function testValidation(): void
    {
        $datiGeneraliDocumento = new DatiGeneraliDocumento('123', '2023-11-13', 123.45);

        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();

        $violations = $validator->validate($datiGeneraliDocumento);

        self::assertCount(0, $violations);
    }
}
