<?php

namespace App\Domain\Entities;

use App\Domain\ValueObjects\AnswerItem;
use App\Domain\ValueObjects\WildCard;

class ItemQuestionEntity
{

    private int $id;
    private string $question;
    private ?string $image;
    private float $percentage;

    /**
     * @var array<key, WildCard[]>|null
     */
    private ?array $wildcards;

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
        ?array $wildcards = null
    ) {
        $this->id = $id;
        $this->question = $question;
        $this->image = $image;
        $this->percentage = $percentage;
        $this->answers = $answers;
        $this->wildcards = $wildcards;
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
            'wildcards' => $this->wildcards ?
                array_map(
                    fn($wildcard) =>
                    array_map(fn($wildcard) => $wildcard->toArray(), $wildcard),
                    array_keys($this->wildcards)
                ) : null,
            'answers' => array_map(fn($answer) => $answer->toArray(), $this->answers)
        ];
    }
}
