<?php

namespace App\Casts;

use App\Domain\Entities\ItemQuestionEntity;
use App\Domain\Interfaces\QuestionCast;
use App\Domain\ValueObjects\Lifeline;
use Brick\Math\BigDecimal;
use Brick\Math\RoundingMode;

class LifelineQuestionCast implements QuestionCast
{
    public function serialize(ItemQuestionEntity $value): ItemQuestionEntity
    {



        $value->addLifeLines([
            'fifty_fifty' => [
                collect($value->getAnswers())->filter(fn($answer) => $answer->isCorrect())->random(),
                collect($value->getAnswers())->filter(fn($answer) => !$answer->isCorrect())->random()
            ],
            'public' => collect($value->getAnswers())->map(function ($answer) use ($value) {

                $forecast = BigDecimal::of($answer->getWeight())
                    ->dividedBy($value->getWeightAnswers(), 14, RoundingMode::HALF_EVEN)
                    ->multipliedBy(100)
                    ->toScale(2, RoundingMode::HALF_FLOOR);



                return new Lifeline($answer->getAnswer(), $forecast);
            })->toArray()

        ]);


        return $value;
    }
}
