<?php

namespace App\Domain\Entities;

use App\Domain\ValueObjects\AnswerItem;
use App\Domain\ValueObjects\Lifeline;

class ItemQuestionEntity
{

    private int $id;
    private string $question;
    private ?string $image;
    private float $percentage;

    /**
     * @var array<key, Lifeline[]>|null
     */
    private ?array $lifelines;

    /**
     * @var AnswerItem[]
     */
    private array $answers;

    public function __construct(
        int $id,
        string $question,
        ?string $image,
        float $percentage,
        array $answers,
        ?array $lifelines = null
    ) {
        $this->id = $id;
        $this->question = $question;
        $this->image = $image;
        $this->percentage = $percentage;
        $this->answers = $answers;
        $this->lifelines = $lifelines;
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

    public function addQuestion($question): void
    {
        $this->question = $question;
    }

    public function addImage($image): void
    {
        $this->image = $image;
    }

    public function addAnswers(array $answers): void
    {
        $this->answers = $answers;
    }

    /**
     * @return AnswerItem[]
     */
    public function getAnswers(): array
    {
        return $this->answers;
    }

    public function addLifeLines(array $lifelines): void
    {
        $this->lifelines = $lifelines;
    }


    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'question' => $this->question,
            'image' => $this->image,
            'percentage' => $this->percentage,
            'lifelines' => $this->lifelines ?
                collect($this->lifelines)->map(fn($lifeline) =>
                collect($lifeline)->map(fn($item) => $item->toArray()))
                ->toArray() : null,
            'answers' => array_map(fn($answer) => $answer->toArray(), $this->answers)
        ];
    }
}
