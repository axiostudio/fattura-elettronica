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

use Axiostudio\FatturaElettronica\Models\CessionarioCommittente;
use Axiostudio\FatturaElettronica\Models\DatiAnagrafici;
use Axiostudio\FatturaElettronica\Models\Sede;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class CessionarioCommittente extends TestCase
{
    public function testConstructor(): void
    {
        $DatiAnagrafici = ['Company Ltd', '0123456789'];
        $Sede = [
            'Via Roma, 1',
            '00100',
            'Roma',
            'RM',
            'IT',
        ];

        $cedentePrestatore = new self($DatiAnagrafici, $Sede);

        self::assertInstanceOf(self::class, $cedentePrestatore);
        self::assertInstanceOf(DatiAnagrafici::class, $cedentePrestatore->DatiAnagrafici);
        self::assertInstanceOf(Sede::class, $cedentePrestatore->Sede);
    }
}
