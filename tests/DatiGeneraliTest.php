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

use Axiostudio\FatturaElettronica\Models\DatiGenerali;
use Axiostudio\FatturaElettronica\Models\DatiGeneraliDocumento;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class DatiGeneraliTest extends TestCase
{
    public function testConstructor(): void
    {
        $datiGeneraliDocumento = [
            '1',
            '2019-01-01',
            '100.00',
        ];

        $datiGenerali = new DatiGenerali($datiGeneraliDocumento);

        self::assertInstanceOf(DatiGenerali::class, $datiGenerali);
        self::assertInstanceOf(DatiGeneraliDocumento::class, $datiGenerali->DatiGeneraliDocumento);
    }
}
