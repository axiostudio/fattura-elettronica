<?php

namespace Axiostudio\FatturaElettronica\DTO;

use ORM\Column;
use Assert\Email;
use Assert\NotEmpty;
use Laminas\Form\Annotation;
use Axiostudio\FatturaElettronica\Types\TipoFattura;

final class Sede
{
    /**
     * @Column(type="string")
     * @NotEmpty
     * @Email
     * @var string
     */
    public string $Indirizzo;
    public string $Cap;
    public string|TipoFattura $Comune;
    public ?string $Provincia = null;
    public string $Nazione = 'IT';
}
