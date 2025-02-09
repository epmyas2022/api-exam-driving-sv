<?php

namespace App\Mapper;

use App\Domain\Entities\QuestionEntity;
use App\Domain\ValueObjects\OptionalParams;

class QuestionMapper
{
    public static function toEntity(array $data): QuestionEntity
    {
        $questionData = $data['objeto'];

        $optionalParams = new OptionalParams(
            $questionData['imagen'],
            $questionData['idCategoria']
        );

        return QuestionEntity::create(
            $questionData['idPregunta'],
            $questionData['interrogante'],
            [
                $questionData['solucion1'],
                $questionData['solucion2'],
                $questionData['solucion3'],
                $questionData['solucion4'],
            ],
            $questionData['respCorrecta'],
            $data['porcentaje'],
            $data['isEnd'] ?? false,
            $optionalParams
        );
    }
}
