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
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class AnagraficaTest extends TestCase
{
    public function testConstructor(): void
    {
        $denominazione = 'Company';
        $nome = 'John';
        $cognome = 'Doe';

        $anagrafica = new Anagrafica($denominazione, $nome, $cognome);

        self::assertInstanceOf(Anagrafica::class, $anagrafica);
        self::assertSame($denominazione, $anagrafica->Denominazione);
        self::assertSame($nome, $anagrafica->Nome);
        self::assertSame($cognome, $anagrafica->Cognome);
    }
}
