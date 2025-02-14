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
            'fifty_fifty' => [],
            'public' => collect($value->getAnswers())->map(function ($answer) use ($value) {

                dd($value->getWeightAnswers());
                $forecast = BigDecimal::of($answer->getWeight())
                    ->dividedBy(round($value->getWeightAnswers()), 2, RoundingMode::HALF_UP)
                    ->multipliedBy(100)
                    ->toScale(6)->toFloat();

                return new Lifeline($answer->getAnswer(), $forecast);
            })->toArray()

        ]);


        return $value;
    }
}
