<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Contracts\Model as ModelInterface;

abstract class Model implements ModelInterface
{
    use \Axiostudio\FatturaElettronica\Handlers\ModelHandlers;
}
