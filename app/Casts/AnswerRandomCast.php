<?php

namespace App\Casts;

use App\Domain\Entities\ItemQuestionEntity;
use App\Domain\Interfaces\QuestionCast;

class AnswerRandomCast implements QuestionCast
{
    public function serialize(ItemQuestionEntity $value): ItemQuestionEntity
    {

        $value->addAnswers(collect($value->getAnswers())->shuffle()->toArray());

        return $value;
    }
}
