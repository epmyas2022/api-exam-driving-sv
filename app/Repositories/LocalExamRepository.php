<?php

namespace App\Repositories;

use App\Collections\QuestionCollection;
use App\Domain\Entities\QuestionEntity;
use App\Domain\Repositories\ExamRepository;
use Illuminate\Support\Facades\Storage;

class LocalExamRepository extends ExamRepository
{
    public function question(?string $type): ?QuestionEntity
    {

        $jsonContent = Storage::disk('local')->get(config('app.outputJson'));

        $questionCollection = new QuestionCollection();

        $questionCollection->fromJson($jsonContent);

        return $questionCollection->takeRandom(1)->first();

    }
}
