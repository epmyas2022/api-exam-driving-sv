<?php

namespace App\Domain\Entities;

use App\Domain\ValueObjects\OptionalParams;

class QuestionEntity
{
    private int $id;
    private string $question;
    private array $answers;
    private int $correctAnswer;
    private float $percentage;
    private bool $isQuestionLast;
    private ?string $urlImage;
    private ?string $category;

    private function __construct(
        int $id,
        string $question,
        array $answers,
        int $correctAnswer,
        float $percentage,
        bool $isQuestionLast,
        OptionalParams $optionalParams
    ) {
        $this->id = $id;
        $this->question = $question;
        $this->answers = $answers;
        $this->correctAnswer = $correctAnswer;
        $this->percentage = $percentage;
        $this->isQuestionLast = $isQuestionLast;

        $this->urlImage = $optionalParams->getUrlImage();
        $this->category = $optionalParams->getCategory();
    }
    public static function create(
        int $id,
        string $question,
        array $answers,
        int $correctAnswer,
        float $percentage,
        bool $isQuestionLast,
        OptionalParams $optionalParams
    ): QuestionEntity {
        return new self(
            $id,
            $question,
            $answers,
            $correctAnswer,
            $percentage,
            $isQuestionLast,
            $optionalParams
        );
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getAnswers(): array
    {
        return $this->answers;
    }

    public function getCorrectAnswer(): int
    {
        return $this->correctAnswer;
    }
    public function getUrlImage(): ?string
    {
        return $this->urlImage;
    }

    public static function  fromArray(array $data): QuestionEntity
    {
        return self::create(
            $data['id'],
            $data['question'],
            $data['answers'],
            $data['correctAnswer'],
            $data['percentage'],
            $data['isQuestionLast'],
            new OptionalParams(
                $data['urlImage'],
                $data['category']
            )
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'question' => $this->question,
            'answers' => $this->answers,
            'correctAnswer' => $this->correctAnswer,
            'percentage' => $this->percentage,
            'isQuestionLast' => $this->isQuestionLast,
            'urlImage' => $this->urlImage,
            'category' => $this->category,
        ];
    }
}
