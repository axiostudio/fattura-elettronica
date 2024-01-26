<?php

namespace Axiostudio\FatturaElettronica\Tests;

use Axiostudio\FatturaElettronica\Models\DettaglioPagamento;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

class DettaglioPagamentoTest extends TestCase
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

        $this->assertInstanceOf(DettaglioPagamento::class, $dettaglioPagamento);
        $this->assertEquals($importoPagamento, $dettaglioPagamento->ImportoPagamento);
        $this->assertEquals($dataScadenzaPagamento, $dettaglioPagamento->DataScadenzaPagamento);
        $this->assertEquals($dataRiferimentoTerminiPagamento, $dettaglioPagamento->DataRiferimentoTerminiPagamento);
        $this->assertEquals($giorniTerminiPagamento, $dettaglioPagamento->GiorniTerminiPagamento);
        $this->assertEquals($beneficiario, $dettaglioPagamento->Beneficiario);
        $this->assertEquals($istitutoFinanziario, $dettaglioPagamento->IstitutoFinanziario);
        $this->assertEquals($iban, $dettaglioPagamento->IBAN);
        $this->assertEquals($abi, $dettaglioPagamento->ABI);
        $this->assertEquals($cab, $dettaglioPagamento->CAB);
        $this->assertEquals($bic, $dettaglioPagamento->BIC);
        $this->assertEquals($modalitaPagamento, $dettaglioPagamento->ModalitaPagamento);
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

        $this->assertInstanceOf(DettaglioPagamento::class, $dettaglioPagamento);
        $this->assertEquals($importoPagamento, $dettaglioPagamento->ImportoPagamento);
        $this->assertEquals($dataScadenzaPagamento, $dettaglioPagamento->DataScadenzaPagamento);
        $this->assertEquals($dataRiferimentoTerminiPagamento, $dettaglioPagamento->DataRiferimentoTerminiPagamento);
        $this->assertEquals($giorniTerminiPagamento, $dettaglioPagamento->GiorniTerminiPagamento);
        $this->assertEquals($beneficiario, $dettaglioPagamento->Beneficiario);
        $this->assertEquals($istitutoFinanziario, $dettaglioPagamento->IstitutoFinanziario);
        $this->assertEquals($modalitaPagamento, $dettaglioPagamento->ModalitaPagamento);
    }

    public function testValidation(): void
    {
        $dettaglioPagamento = new DettaglioPagamento(100.00, '2023-01-01', '2023-01-05', '5', 'John Doe', 'Bank ABC', 'IT60X0542811101000000123456', '12345', '67890', 'ABCITR12345', 'MP02');

        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();

        $violations = $validator->validate($dettaglioPagamento);

        $this->assertCount(0, $violations);
    }
}
