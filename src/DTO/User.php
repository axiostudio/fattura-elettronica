<?php

namespace Axiostudio\FatturaElettronica\DTO;

use Assert\Email;
use Assert\Numeric;
use Doctrine\ORM\Mapping as ORM;

class User
{
    /**
     * @Numeric
     */
    protected $email;

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }
}
