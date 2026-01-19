<?php

namespace App\Enum;

enum VoitureTypeTransmission : string
{
    case Automatique = 'Automatique';
    case Manuelle = 'Manuelle';

    public function getLabel(): string
    {
        return $this->value;
    }
}
