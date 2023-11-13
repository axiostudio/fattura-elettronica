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

use Axiostudio\FatturaElettronica\Models\Anagrafica;
use Axiostudio\FatturaElettronica\Models\DatiAnagrafici;
use Axiostudio\FatturaElettronica\Models\Id;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class DatiAnagraficiTest extends TestCase
{
    public function testConstructor(): void
    {
        $id = '0123456789';
        $anagrafica = ['Company Ltd', 'John', 'Doe'];

        $codiceFiscale = 'ABC123XYZ4567890';
        $regimeFiscale = 'RegimeFiscaleValue';

        $datiAnagrafici = new DatiAnagrafici($id, $anagrafica, $codiceFiscale, $regimeFiscale);

        self::assertInstanceOf(DatiAnagrafici::class, $datiAnagrafici);
        self::assertInstanceOf(Id::class, $datiAnagrafici->IdFiscaleIVA);
        self::assertInstanceOf(Anagrafica::class, $datiAnagrafici->Anagrafica);
        self::assertSame($codiceFiscale, $datiAnagrafici->CodiceFiscale);
        self::assertSame($regimeFiscale, $datiAnagrafici->RegimeFiscale);
    }
}
