<?php

namespace App\Repositories;

use App\Collections\QuestionCollection;
use App\Domain\Entities\QuestionEntity;
use App\Domain\Repositories\PersistenceRepository;
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



    public function all(?string $type, int $number = 5)
    {

        $castImage = fn($image) => $image ?
            url(Storage::url(config('app.outputImage') . $image)) : null;

        if ($type) {
            return $this->questionCollection->filterByCategory($type)
                ?->takeRandomInQuestions($number)
                ?->setCastImageQuestions($castImage)
                ?->first()?->toArray();
        }

        return $this->questionCollection
            ?->setCastImageQuestions($castImage)
            ?->takeRandomInQuestions($number);
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
                $image = @file_get_contents(config("app.externalAPI") . $question->getImage());

                if (!$image) {
                    return;
                }

                $nameImage = basename($question->getImage());

                $pathImage = config('app.outputImage') . $nameImage;

                $image = Storage::disk('local')
                    ->put($pathImage, $image);

                $question->addImage($nameImage);
            }
        }
        $this->questionCollection->upsertQuestions($data);

        Storage::disk('local')->put(config('app.outputJson'), $this->questionCollection->toJson());

        Log::info('Question saved in local storage: ' . Carbon::now());
    }
}
