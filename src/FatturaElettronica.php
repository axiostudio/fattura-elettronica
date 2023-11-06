<?php

namespace Axiostudio\FatturaElettronica;

class FatturaElettronica
{
    public function test()
    {
        try {
            $mapper = (new \CuyZ\Valinor\MapperBuilder())->mapper();
            $data = $mapper->map(
                \Axiostudio\FatturaElettronica\DTO\Sede::class,
                \CuyZ\Valinor\Mapper\Source\Source::array([
                    'Indirizzo' => 'Via Roma 1',
                    'Cap' => '00100',
                    'Comune' => 'Roma',
                ])
            );

            return $data->Comune;
        } catch (\CuyZ\Valinor\Mapper\MappingError $error) {
            return $error->getMessage();
        }
    }
}
