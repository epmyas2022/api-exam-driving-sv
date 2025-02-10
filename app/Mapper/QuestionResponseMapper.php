<?php

namespace App\Mapper;

use App\Domain\Entities\QuestionEntity;
use App\Domain\ValueObjects\OptionalParams;
use Illuminate\Support\Arr;

class QuestionResponseMapper
{

    private int $id;
    private string $interrogante;
    private array $soluciones;
    private string $respCorrecta;
    private float $porcentaje;
    private ?bool $isEnd;
    private ?string $imagen;
    private ?string $idCategoria;

    private function __construct(
        int $id,
        string $interrogante,
        array $soluciones,
        string $respCorrecta,
        float $porcentaje,
        ?bool $isEnd,
        ?object $optional
    ) {
        $this->id = $id;
        $this->interrogante = $interrogante;
        $this->soluciones = $soluciones;
        $this->respCorrecta = $respCorrecta;
        $this->porcentaje = $porcentaje;
        $this->isEnd = $isEnd;
        $this->imagen = $optional?->imagen;
        $this->idCategoria = $optional?->idCategoria;
    }

    public static function from(array $data): self
    {
        return new self(
            Arr::get($data, 'objeto.idPregunta'),
            Arr::get($data, 'objeto.interrogante'),
            [
                Arr::get($data, 'objeto.solucion1'),
                Arr::get($data, 'objeto.solucion2'),
                Arr::get($data, 'objeto.solucion3'),
                Arr::get($data, 'objeto.solucion4'),
            ],
            Arr::get($data, 'objeto.respCorrecta'),
            Arr::get($data, 'porcentaje'),
            Arr::get($data, 'isEnd', false),
            (object) [
                'imagen' => Arr::get($data, 'objeto.imagen'),
                'idCategoria' => Arr::get($data, 'objeto.idCategoria'),
            ]
        );
    }


    public function toEntity(): QuestionEntity
    {
        $optionalParams = new OptionalParams(
            $this->imagen,
            $this->idCategoria
        );

        return QuestionEntity::create(
            $this->id,
            $this->interrogante,
            $this->soluciones,
            $this->respCorrecta,
            $this->porcentaje,
            $this->isEnd ?? false,
            $optionalParams
        );
    }
}
