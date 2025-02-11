<?php

namespace App\Collections;

use App\Domain\Entities\QuestionEntity;
use Illuminate\Support\Collection;

class QuestionCollection extends Collection
{
    /**
     * The items contained in the collection.
     *
     * @var array<QuestionEntity>
     */
    protected $items = [];


    /**
     * QuestionCollection constructor.
     * @param array<QuestionEntity> $items
     */
    public function __construct($items = [])
    {
        parent::__construct($items);
    }

    public function addQuestion(QuestionEntity $question)
    {
        $this->push($question);
    }

    public function getQuestionById(int $id): ?QuestionEntity
    {
        return $this->first(fn($question) => $question->getId() === $id);
    }

    public function getQuestionByCategory(string $category): ?QuestionEntity
    {
        return $this->first(fn($question) => $question->getCategory() === $category);
    }

    public function getQuestionByPercentage(float $percentage): ?QuestionEntity
    {
        return $this->first(fn($question) => $question->getPercentage() === $percentage);
    }

    public function getFilterByCategory(string $category): Collection
    {
        return new Self(collect($this->items)->filter(fn($question) => $question->getCategory() === $category));
    }

    public function takeRandom(int $number): self
    {

        if ($number > $this->count()) {
            return $this;
        }

        return new Self(collect($this->items)->random($number));
    }

    public function take($limit): self
    {
        return new Self(collect($this->items)->take($limit));
    }

    /**
     * @param int $id
     * @return bool
     */
    public function toJson($options = 1)
    {
        $data = collect($this->items)->map->toArray();

        return json_encode($data, $options);
    }

    public function fromJson(?string $json)
    {
        if (empty($json) || is_null($json)) {
            return;
        }
        $data = json_decode($json, true);

        $this->items  = collect($data)->map(function ($question) {
            return QuestionEntity::fromArray($question);
        });
    }
}
