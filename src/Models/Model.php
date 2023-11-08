<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Contracts\Model as ModelInterface;
use Axiostudio\FatturaElettronica\Handlers\Model as ModelHandler;

abstract class Model implements ModelInterface
{
    use ModelHandler;
}
