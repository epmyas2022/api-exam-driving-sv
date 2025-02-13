<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        dd($this->resource);
        return [
            'id' => $this->resource?->getId(),
            'question' => $this->resource?->getQuestion(),
            'image' => $this->resource?->getUrlImage(),
            'percentage' => $this->resource?->getPercentage(),
            'listAnswers' => collect($this->resource?->getAnswers())->map(fn($answer, $index) => [
                'answer' => $answer,
                'isCorrect' => $index === $this->getCorrectAnswer() - 1
            ])

        ];
    }
}
