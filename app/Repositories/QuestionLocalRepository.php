<?php

namespace App\Repositories;

use App\Collections\QuestionCollection;
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
     * @return array<QuestionEntity>
     */

    public function all(?string $type)
    {
        $questions =  $this->questionCollection
            ->when($type, fn($collection) => $collection->getFilterByCategory($type))
            ->takeRandom(30)
            ->addDefaultLastQuestion()
            ->toResource(QuestionResource::class);
        return new HeaderQuestionResource($questions);
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
        $this->questionCollection->addQuestion($data);

        Storage::disk('local')
            ->put(config('app.outputJson'), $this->questionCollection->toResourceJson(QuestionResource::class));

        if ($data->getUrlImage()) {
            $image = file_get_contents(config("app.externalAPI") . $data->getUrlImage());
            Storage::disk('local')
                ->put(config('app.outputImage') . $data->getUrlImage(), $image);
        }

        Log::info('Question saved in local storage: ' . Carbon::now());
    }
}
