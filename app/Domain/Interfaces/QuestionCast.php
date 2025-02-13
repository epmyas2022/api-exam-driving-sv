<?php

namespace App\Domain\Interfaces;

use App\Domain\Entities\ItemQuestionEntity;

interface QuestionCast
{

    public function serialize(ItemQuestionEntity $item): ItemQuestionEntity;
}
