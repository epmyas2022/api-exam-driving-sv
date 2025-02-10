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

    public function save(QuestionEntity $data)
    {
        $jsonContent = Storage::disk('local')->get('question.json');

        $questionCollection = new QuestionCollection();

        $questionCollection->fromJson($jsonContent);

        $questionCollection->addQuestion($data);

        Storage::disk('local')
            ->put('question.json', $questionCollection->toJson());

        if ($data->getUrlImage()) {
            $image = file_get_contents(config("app.externalAPI") . $data->getUrlImage());
            Storage::disk('local')
                ->put('public/img/' . $data->getUrlImage(), $image);
        }

        Log::info('Question saved in local storage: ' . Carbon::now());
    }
}
