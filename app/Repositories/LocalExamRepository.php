<?php

namespace App\Repositories;

use App\Domain\Entities\QuestionEntity;
use App\Domain\Repositories\ExamRepository;

class LocalExamRepository extends ExamRepository
{
    public function questions(?string $type): ?QuestionEntity
    {
        return null;
    }
}
