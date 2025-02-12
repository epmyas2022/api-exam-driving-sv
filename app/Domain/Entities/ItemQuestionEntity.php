<?php

namespace App\Domain\Entities;

class ItemQuestionEntity{

    private int $id;
    private string $question;
    private ?string $image;
    private float $percentage;

    /**
     * @var AnswerItem[]
     */
    private array $answers;

    public function __construct(
        int $id,
        string $question,
        ?string $image,
        float $percentage,
        array $answers
    ) {
        $this->id = $id;
        $this->question = $question;
        $this->image = $image;
        $this->percentage = $percentage;
        $this->answers = $answers;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getQuestion(): string
    {
        return $this->question;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function getPercentage(): float
    {
        return $this->percentage;
    }

    public function addQuestion( $question): void
    {
        $this->question = $question;
    }


    /**
     * @return AnswerItem[]
     */
    public function getAnswers(): array
    {
        return $this->answers;
    }


    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'question' => $this->question,
            'image' => $this->image,
            'percentage' => $this->percentage,
            'answers' => array_map(fn($answer) => $answer->toArray(), $this->answers)
        ];
    }

}
