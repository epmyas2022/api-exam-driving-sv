<?php

namespace App\Domain\ValueObjects;

class AnswerItem {

    private string $answer;
    private bool $isCorrect;

    public function __construct(string $answer, bool $isCorrect)
    {
        $this->answer = $answer;
        $this->isCorrect = $isCorrect;
    }

    public function getAnswer(): string
    {
        return $this->answer;
    }

    public function isCorrect(): bool
    {
        return $this->isCorrect;
    }

    public function toArray(): array
    {
        return [
            'answer' => $this->answer,
            'isCorrect' => $this->isCorrect
        ];
    }
}
