<?php

namespace App\Mapper;

use App\Domain\Entities\QuestionEntity;
use App\Domain\ValueObjects\AnswerItem;
use App\Domain\Entities\HeaderQuestionEntity;
use App\Domain\Entities\ItemQuestionEntity;
use Illuminate\Support\Arr;
use Ramsey\Uuid\Uuid;

class QuestionResponseMapper
{

    private int $id;
    private string $interrogante;
    private array $soluciones;
    private int $respCorrecta;
    private float $porcentaje;
    private ?string $imagen;
    private ?string $idCategoria;

    private function __construct(
        int $id,
        string $interrogante,
        array $soluciones,
        string $respCorrecta,
        float $porcentaje,
        ?object $optional
    ) {
        $this->id = $id;
        $this->interrogante = $interrogante;
        $this->soluciones = $soluciones;
        $this->respCorrecta = $respCorrecta;
        $this->porcentaje = $porcentaje;
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
            (object) [
                'imagen' => Arr::get($data, 'objeto.imagen'),
                'idCategoria' => Arr::get($data, 'objeto.idCategoria'),
            ]
        );
    }


    public function toEntity(): QuestionEntity
    {
        return QuestionEntity::create(
            new HeaderQuestionEntity(
                Uuid::uuid4()->toString(),
                $this->idCategoria,
                1
            ),
            [
                new ItemQuestionEntity(
                    $this->id,
                    $this->interrogante,
                    $this->imagen,
                    $this->porcentaje,
                    collect($this->soluciones)
                        ->map(
                            fn($solucion, $index) =>
                            new AnswerItem($solucion, $index + 1 === $this->respCorrecta)
                        )->toArray()
                )
            ]

        );
    }
}
