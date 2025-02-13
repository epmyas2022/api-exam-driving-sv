<?php

namespace App\Domain\ValueObjects;

class WildCard
{

    private string $answer;
    private float $percentage;

    public function __construct(string $answer, float $percentage)
    {
        $this->answer = $answer;
        $this->percentage = $percentage;
    }


    public function getPercentage(): float
    {
        return $this->percentage;
    }
    public function getAnswer(): string
    {
        return $this->answer;
    }

    public function toArray(): array
    {
        return [
            'answer' => $this->answer,
            'percentage' => $this->percentage
        ];
    }
}
