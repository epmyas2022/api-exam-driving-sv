<?php

namespace App\Services;

use App\Collections\QuestionCollection;
use App\Domain\Services\PersistenceService;
use App\Domain\Entities\QuestionEntity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class QuestionLocalService extends PersistenceService
{
    private QuestionCollection $questionCollection;
    public function __construct()
    {
        $jsonContent = Storage::disk('local')->get('question.json');

        $this->questionCollection = new QuestionCollection();
        $this->questionCollection->fromJson($jsonContent);
    }

    /**
     * Get all questions
     * @return array<QuestionEntity>
     */

    public function all()
    {
        return $this->questionCollection->takeRandom(10);
    }

        /**
     * Find question by id
     * @param int $id
     * @return QuestionEntity|null
     */
    public function find(int $id) {
        return $this->questionCollection->getQuestionById($id);
    }

    public function save(QuestionEntity $data)
    {
        $this->questionCollection->addQuestion($data);

        Storage::disk('local')
            ->put('question.json', $this->questionCollection->toJson());

        if ($data->getUrlImage()) {
            $image = file_get_contents(config("app.externalAPI") . $data->getUrlImage());
            Storage::disk('local')
                ->put('public/img/' . $data->getUrlImage(), $image);
        }

        Log::info('Question saved in local storage: ' . Carbon::now());
    }
}
