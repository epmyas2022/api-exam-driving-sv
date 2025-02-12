<?php

namespace App\Repositories;

use App\Collections\QuestionCollection;
use App\Domain\Entities\ItemQuestionEntity;
use App\Domain\Entities\QuestionEntity;
use App\Domain\Repositories\PersistenceRepository;
use App\Http\Resources\HeaderQuestionResource;
use App\Http\Resources\QuestionResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class QuestionLocalRepository extends PersistenceRepository
{
    private QuestionCollection $questionCollection;

    public function __construct()
    {
        $jsonContent = Storage::disk('local')->get(config('app.outputJson'));

        $this->questionCollection = new QuestionCollection();

        $this->questionCollection->fromJson($jsonContent);
    }



    /**
     * Get all questions
     * @return QuestionEntity
     */

    public function all(?string $type)
    {
        return $this->questionCollection
            ->when($type, fn($collection) => $collection->filterByCategory($type))
            ->takeRandomInQuestions(5)->first()->toArray();
    }
    /**
     * Find question by id
     * @param int $id
     * @return QuestionEntity|null
     */
    public function find(int $id)
    {
        return $this->questionCollection->getQuestionById($id);
    }

    public function save(QuestionEntity $data)
    {

        $this->questionCollection->upsertQuestions($data);

        Storage::disk('local')
            ->put(
                config('app.outputJson'),
                $this->questionCollection->toJson()
            );


        foreach ($data->getQuestions() as $question) {

            if ($question->getImage()) {
                $image = file_get_contents(config("app.externalAPI") . $question->getImage());
                Storage::disk('local')
                    ->put(config('app.outputImage') . $question->getImage(), $image);
            }
        }

        Log::info('Question saved in local storage: ' . Carbon::now());
    }
}
