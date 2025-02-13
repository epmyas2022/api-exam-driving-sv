<?php

namespace App\Casts;

use App\Domain\Entities\ItemQuestionEntity;
use App\Domain\Interfaces\QuestionCast;
use App\Domain\ValueObjects\Lifeline;

class LifelineQuestionCast implements QuestionCast
{
    public function serialize(ItemQuestionEntity $value): ItemQuestionEntity
    {

        $value->addLifeLines([
            'fifty_fifty' => [

                new Lifeline('A', 50),
                new Lifeline('B', 50)
            ],
            'public' => [
                new Lifeline('A', 25),
                new Lifeline('B', 25),
                new Lifeline('C', 25),
                new Lifeline('D', 25)
            ],

        ]);

        return $value;
    }
}
