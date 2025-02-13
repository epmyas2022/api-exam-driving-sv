<?php

namespace App\Domain\Entities;

use App\Domain\ValueObjects\AnswerItem;

class QuestionEntity
{
    private HeaderQuestionEntity $header;

    /**
     * @var QuestionItem[]
     */
    private array $questions;

    public function __construct(HeaderQuestionEntity $header, array $questions)
    {
        $this->header = $header;
        $this->questions = $questions;
    }

    public static function create(
        HeaderQuestionEntity $header,
        array $questions
    ): QuestionEntity {
        return new self(
            $header,
            $questions
        );
    }

    public function getHeader(): HeaderQuestionEntity
    {
        return $this->header;
    }

    /**
     * @return ItemQuestionEntity[]
     */
    public function getQuestions(): array
    {
        return $this->questions;
    }

    public function setQuestions(array $questions): void
    {
        $this->questions = $questions;
    }

    public function addQuestions( $questions): void
    {
        $this->questions = array_merge($this->questions, $questions);
    }

    public function getSize(): int
    {
        return count($this->questions);
    }

    public static function  fromArray(array $data): QuestionEntity
    {
        return self::create(
            new HeaderQuestionEntity(
                $data['id'],
                $data['category'],
                $data['total']
            ),
            array_map(
                fn($question) => new ItemQuestionEntity(
                    $question['id'],
                    $question['question'],
                    $question['image'],
                    $question['percentage'],
                    array_map(
                        fn($answer) => new AnswerItem(
                            $answer['answer'],
                            $answer['isCorrect']
                        ),
                        $question['answers']
                    )
                ),
                $data['listQuestions']
            )
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->header->getId(),
            'category' => $this->header->getCategory(),
            'total' => $this->header->getTotal(),
            'listQuestions' => array_map(
                fn($question) => $question->toArray(),
                $this->questions
            )
        ];
    }
}
