<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Abstracts\Model;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class DatiAnagrafici extends Model
{
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

        if (isset($args[2]) && $args[2]) {
            $this->CodiceFiscale = $args[2];
        }

        if (isset($args[3]) && $args[3]) {
            $this->RegimeFiscale = $args[3];
        }
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('CodiceFiscale', new Length(null, 8, 16));
        $metadata->addPropertyConstraint('RegimeFiscale', new Choice(['RF1', 'RF01', 'RF2', 'RF02', 'RF04', 'RF05', 'RF06', 'RF07', 'RF08', 'RF09', 'RF10', 'RF11', 'FR12', 'RF13', 'RF14', 'RF15', 'RF16', 'RF17', 'RF18', 'RF19']));
    }
}
