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

use Axiostudio\FatturaElettronica\Models\DatiBeniServizi;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class DatiBeniservizi extends TestCase
{
    public function testConstructor(): void
    {
        $datiBeniServizi = new self();

        self::assertInstanceOf(self::class, $datiBeniServizi);
        self::assertNull($datiBeniServizi->XmlDatiBeniServizi);
    }
}
