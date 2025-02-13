<?php

namespace App\Repositories;

use App\Collections\QuestionCollection;
use App\Domain\Entities\QuestionEntity;
use App\Domain\Repositories\PersistenceRepository;
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



    public function all(?string $type, int $number = 5)
    {

        if ($type) {
            return $this->questionCollection->filterByCategory($type)
                ?->takeRandomInQuestions($number)
                ?->first()?->toArray();
        }

        return $this->questionCollection?->takeRandomInQuestions($number);
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
        foreach ($data->getQuestions() as $question) {

            if ($question->getImage()) {
                $image = file_get_contents(config("app.externalAPI") . $question->getImage());

                $pathImage = config('app.outputImage') . basename($question->getImage());

                $image = Storage::disk('local')
                    ->put($pathImage, $image);


                $question->addImage(url(Storage::url($pathImage)));
            }
        }
        $this->questionCollection->upsertQuestions($data);

        Storage::disk('local')->put(config('app.outputJson'), $this->questionCollection->toJson());

        Log::info('Question saved in local storage: ' . Carbon::now());
    }
}
