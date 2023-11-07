<?php

namespace Axiostudio\FatturaElettronica;

use Spatie\ArrayToXml\ArrayToXml;
use Symfony\Component\Validator\Validation;
use Axiostudio\FatturaElettronica\Contracts\Model;

class FatturaElettronica
{
    public function createModel(Model $model)
    {
        $validator = Validation::createValidatorBuilder()
            ->addMethodMapping('loadValidatorMetadata')
            ->getValidator();

        $errors = $validator->validate($model);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;
            throw new \Exception($errorsString);
        }

        return $model;
    }

    public function modelToArray(Model $model): array
    {
        return json_decode(json_encode($model), true);
    }

    public function createXml(array $array): string
    {
        $xml = ArrayToXml::convert($array);

        return $this->updateXml($xml);
    }

    protected function updateXml(string $xml, string $version = 'FPR12'): string
    {
        $xml = str_replace('<?xml version="1.0"?>', '<v1:FatturaElettronica xmlns:v1="http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.2" versione="' . $version . '">', $xml);
        $xml = str_replace('<root>', '', $xml);
        $xml = str_replace('</root>', '</v1:FatturaElettronica>', $xml);

        return $xml;
    }
}
