<?php

namespace App\Collections;

use App\Domain\Entities\ItemQuestionEntity;
use App\Domain\Entities\QuestionEntity;
use Illuminate\Http\Resources\Json\JsonResource;
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

    public function upsertQuestions(QuestionEntity $question)
    {

        $questionExist = $this->getHeaderCategory($question->getHeader()->getCategory());
        if (!$questionExist) {
            $this->addQuestion($question);
            return;
        }

        $questionExist->addQuestions($question->getQuestions());
        $questionExist->getHeader()->setTotal($questionExist->getSize());
    }

    public function getQuestionById(int $id): ?QuestionEntity
    {
        return collect($this->items)->first(fn($question) =>
        collect($question->getQuestions())->first(fn($item) => $item->getId() === $id));
    }

    public function getHeaderId(int $id): ?QuestionEntity
    {
        return collect($this->items)->first(fn($question) => $question->getHeader()->getId() === $id);
    }

    public function getHeaderCategory(string $category): ?QuestionEntity
    {
        return collect($this->items)->first(fn($question) => $question->getHeader()->getCategory() === $category);
    }

    public function filterByCategory(string $category): self
    {
        return new Self(collect($this->items)->filter(fn($question) => $question->getHeader()->getCategory() === $category)
            ->values());
    }

    public function takeRandom(int $number): self
    {
        return new Self(collect($this->items)->random($number)->values());
    }

    public function takeRandomInQuestions(int $number): self
    {
        return new Self(collect($this->items)->map(function ($question) use ($number) {

            if ($question->getSize() <= $number) {
                return $question;
            }
            $question->setQuestions(collect($question->getQuestions())
                ->random($number)->values()->toArray());
            $question->getHeader()->setTotal($question->getSize());
            return $question;
        }));
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

    /**
     * @param JsonResource $resource
     */
    public function toResource($resource)
    {
        return $resource::collection($this->items);
    }

    public function toResourceJson($resource)
    {
        return $resource::collection($this->items)->toJson();
    }
}
