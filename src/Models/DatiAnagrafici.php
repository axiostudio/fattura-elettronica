<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Models\Id;
use Axiostudio\FatturaElettronica\Contracts\Model;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Axiostudio\FatturaElettronica\Models\Anagrafica;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Axiostudio\FatturaElettronica\Handlers\ModelHandlers;

class DatiAnagrafici implements Model
{
    use ModelHandlers;

    public Id $IdFiscaleIVA;
    public Anagrafica $Anagrafica;
    public ?string $CodiceFiscale;
    public ?string $RegimeFiscale;

    public function __construct(...$args)
    {
        $this->IdFiscaleIVA = is_array($args[0]) ?
            $this->createModel(new Id(...$args[0])) :
            $this->createModel(new Id($args[0]));

        $this->Anagrafica = is_array($args[1]) ?
            $this->createModel(new Anagrafica(...$args[1])) :
            $this->createModel(new Anagrafica($args[1]));

        if ($args[2]) {
            $this->CodiceFiscale = $args[2];
        }

        if ($args[3]) {
            $this->RegimeFiscale = $args[3];
        }
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('CodiceFiscale', new Length(null, 8, 16));
        $metadata->addPropertyConstraint('RegimeFiscale', new Choice(['RF1', 'RF01', 'RF2', 'RF02', 'RF04', 'RF05', 'RF06', 'RF07', 'RF08', 'RF09', 'RF10', 'RF11', 'FR12', 'RF13', 'RF14', 'RF15', 'RF16', 'RF17', 'RF18', 'RF19']));
    }
}
