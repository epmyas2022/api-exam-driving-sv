<?php

namespace App\Domain\ValueObjects;

class AnswerItem
{

    private string $answer;
    private bool $isCorrect;
    private int $weight;

    public function __construct(
        string $answer,
        bool $isCorrect,
        int $biasCorrect = 40
    ) {
        $this->answer = $answer;
        $this->isCorrect = $isCorrect;

        $this->weight = $isCorrect ? rand($biasCorrect, 100) :
            rand(0, $biasCorrect);
    }

    public function getAnswer(): string
    {
        return $this->answer;
    }

    public function isCorrect(): bool
    {
        return $this->isCorrect;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function toArray(): array
    {
        return [
            'answer' => $this->answer,
            'isCorrect' => $this->isCorrect
        ];
    }
}
