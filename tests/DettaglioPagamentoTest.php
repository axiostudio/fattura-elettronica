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

use Axiostudio\FatturaElettronica\Models\DettaglioPagamento;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

/**
 * @internal
 *
 * @coversNothing
 */
final class DettaglioPagamentoTest extends TestCase
{
    public function testConstructorWithIBAN(): void
    {
        $importoPagamento = 100.00;
        $dataScadenzaPagamento = '2023-01-01';
        $dataRiferimentoTerminiPagamento = '2023-01-05';
        $giorniTerminiPagamento = '5';
        $beneficiario = 'John Doe';
        $istitutoFinanziario = 'Bank ABC';
        $iban = 'IT60X0542811101000000123456';
        $abi = '12345';
        $cab = '67890';
        $bic = 'ABCITR12345';
        $modalitaPagamento = 'MP02';

        $dettaglioPagamento = new DettaglioPagamento(
            $importoPagamento,
            $dataScadenzaPagamento,
            $dataRiferimentoTerminiPagamento,
            $giorniTerminiPagamento,
            $beneficiario,
            $istitutoFinanziario,
            $iban,
            $abi,
            $cab,
            $bic,
            $modalitaPagamento
        );

        self::assertInstanceOf(DettaglioPagamento::class, $dettaglioPagamento);
        self::assertSame($importoPagamento, $dettaglioPagamento->ImportoPagamento);
        self::assertSame($dataScadenzaPagamento, $dettaglioPagamento->DataScadenzaPagamento);
        self::assertSame($dataRiferimentoTerminiPagamento, $dettaglioPagamento->DataRiferimentoTerminiPagamento);
        self::assertSame($giorniTerminiPagamento, $dettaglioPagamento->GiorniTerminiPagamento);
        self::assertSame($beneficiario, $dettaglioPagamento->Beneficiario);
        self::assertSame($istitutoFinanziario, $dettaglioPagamento->IstituroFinanziario);
        self::assertSame($iban, $dettaglioPagamento->IBAN);
        self::assertSame($abi, $dettaglioPagamento->ABI);
        self::assertSame($cab, $dettaglioPagamento->CAB);
        self::assertSame($bic, $dettaglioPagamento->BIC);
        self::assertSame($modalitaPagamento, $dettaglioPagamento->ModalitaPagamento);
    }

    public function testConstructorWithoutIBAN(): void
    {
        $importoPagamento = 100.00;
        $dataScadenzaPagamento = '2023-01-01';
        $dataRiferimentoTerminiPagamento = '2023-01-05';
        $giorniTerminiPagamento = '5';
        $beneficiario = 'John Doe';
        $istitutoFinanziario = 'Bank ABC';
        $modalitaPagamento = 'MP02';

        $dettaglioPagamento = new DettaglioPagamento(
            $importoPagamento,
            $dataScadenzaPagamento,
            $dataRiferimentoTerminiPagamento,
            $giorniTerminiPagamento,
            $beneficiario,
            $istitutoFinanziario,
            null,
            null,
            null,
            null,
            $modalitaPagamento
        );

        self::assertInstanceOf(DettaglioPagamento::class, $dettaglioPagamento);
        self::assertSame($importoPagamento, $dettaglioPagamento->ImportoPagamento);
        self::assertSame($dataScadenzaPagamento, $dettaglioPagamento->DataScadenzaPagamento);
        self::assertSame($dataRiferimentoTerminiPagamento, $dettaglioPagamento->DataRiferimentoTerminiPagamento);
        self::assertSame($giorniTerminiPagamento, $dettaglioPagamento->GiorniTerminiPagamento);
        self::assertSame($beneficiario, $dettaglioPagamento->Beneficiario);
        self::assertSame($istitutoFinanziario, $dettaglioPagamento->IstituroFinanziario);
        self::assertSame($modalitaPagamento, $dettaglioPagamento->ModalitaPagamento);
    }

    public function testValidation(): void
    {
        $dettaglioPagamento = new DettaglioPagamento(100.00, '2023-01-01', '2023-01-05', '5', 'John Doe', 'Bank ABC', 'IT60X0542811101000000123456', '12345', '67890', 'ABCITR12345', 'MP02');

        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();

        $violations = $validator->validate($dettaglioPagamento);

        self::assertCount(0, $violations);
    }
}
