<?php

namespace Axiostudio\FatturaElettronica\Tests;

use Axiostudio\FatturaElettronica\Models\DatiBeniServizi;
use PHPUnit\Framework\TestCase;

class DatiBeniServiziTest extends TestCase
{
    public function testConstructor(): void
    {
        $datiBeniServizi = new DatiBeniServizi();

        $this->assertInstanceOf(DatiBeniServizi::class, $datiBeniServizi);
        $this->assertNull($datiBeniServizi->XmlDatiBeniServizi);
    }
}
