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

use Axiostudio\FatturaElettronica\Models\DatiPagamento;
use Axiostudio\FatturaElettronica\Models\DettaglioPagamento;
use Axiostudio\FatturaElettronica\Settings;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class DatiPagamentoTest extends TestCase
{
    public function testConstructor(): void
    {
        $dettaglioPagamento = [100.00];

        $datiPagamento = new DatiPagamento($dettaglioPagamento);

        self::assertInstanceOf(DatiPagamento::class, $datiPagamento);
        self::assertInstanceOf(DettaglioPagamento::class, $datiPagamento->DettaglioPagamento);
        self::assertSame(Settings::CondizioniPagamentoDefault(), $datiPagamento->CondizioniPagamento);
    }
}
