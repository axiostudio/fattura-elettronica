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

use Axiostudio\FatturaElettronica\Models\DatiRiepilogo;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class DatiRiepilogoTest extends TestCase
{
    public function testConstructorWithNatura(): void
    {
        $imponibileImporto = 100.00;
        $aliquotaIVA = 22.00;
        $natura = 'N1';

        $datiRiepilogo = new DatiRiepilogo($imponibileImporto, $aliquotaIVA, $natura);

        self::assertInstanceOf(DatiRiepilogo::class, $datiRiepilogo);
        self::assertSame($imponibileImporto, $datiRiepilogo->ImponibileImporto);
        self::assertSame($aliquotaIVA, $datiRiepilogo->AliquotaIVA);
        self::assertSame($natura, $datiRiepilogo->Natura);
        self::assertSame($imponibileImporto * $aliquotaIVA / 100, $datiRiepilogo->Imposta);
    }
}
