<?php

namespace App\Domain\ValueObjects;

class Lifeline
{

    private string $answer;
    private  $percentage;
    private ?string $help;

    public function __construct(
        string $answer,
         $percentage = null,
        ?string $help = null
    ) {
        $this->answer = $answer;
        $this->percentage = $percentage;
        $this->help = $help;
    }


    public function getPercentage()
    {
        return $this->percentage;
    }
    public function getAnswer(): string
    {
        return $this->answer;
    }

    public function getHelp(): string
    {
        return $this->help;
    }

    public function setHelp(string $help): void
    {
        $this->help = $help;
    }

    public function setPercentage(float $percentage): void
    {
        $this->percentage = $percentage;
    }

    public function setAnswer(string $answer): void
    {
        $this->answer = $answer;
    }

    public function toArray(): array
    {
        return [
            'answer' => $this->answer,
            'percentage' => $this->percentage
        ];
    }
}
