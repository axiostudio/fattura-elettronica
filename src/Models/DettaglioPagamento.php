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

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Abstracts\Model;
use Axiostudio\FatturaElettronica\Settings;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Iban;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class DettaglioPagamento extends Model
{
    public float $ImportoPagamento;
    public ?string $DataScadenzaPagamento;
    public ?string $DataRiferimentoTerminiPagamento;
    public ?string $GiorniTerminiPagamento;
    public ?string $Beneficiario;
    public ?string $IstituroFinanziario;
    public ?string $IBAN;
    public ?string $ABI;
    public ?string $CAB;
    public ?string $BIC;
    public ?string $ModalitaPagamento;

    public function __construct(...$args)
    {
        $this->ImportoPagamento = $args[0];

        if (isset($args[1]) && $args[1]) {
            $this->DataScadenzaPagamento = $args[1];
        }

        if (isset($args[2]) && $args[2]) {
            $this->DataRiferimentoTerminiPagamento = $args[2];
        }

        if (isset($args[3]) && $args[3]) {
            $this->GiorniTerminiPagamento = $args[3];
        }

        if (isset($args[4]) && $args[4]) {
            $this->Beneficiario = $args[4];
        }

        if (isset($args[5]) && $args[5]) {
            $this->IstituroFinanziario = $args[5];
        }

        if (isset($args[6]) && $args[6]) {
            $this->IBAN = $args[6];
        }

        if (isset($args[7]) && $args[7]) {
            $this->ABI = $args[7];
        }

        if (isset($args[7]) && $args[8]) {
            $this->CAB = $args[8];
        }

        if (isset($args[8]) && $args[9]) {
            $this->BIC = $args[9];
        }

        $this->ModalitaPagamento = (isset($args[10]) && $args[10]) ? $args[10] : Settings::ModalitaPagamentoDefault();
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('DataScadenzaPagamento', new Date());
        $metadata->addPropertyConstraint('DataRiferimentoTerminiPagamento', new Date());
        $metadata->addPropertyConstraint('IBAN', new Iban());
        $metadata->addPropertyConstraint('ABI', new Length(5));
        $metadata->addPropertyConstraint('CAB', new Length(5));
        $metadata->addPropertyConstraint('BIC', new Length(null, 8, 11));
        $metadata->addPropertyConstraint('ModalitaPagamento', new Choice(Settings::ModalitaPagamento()));
    }
}
