<?php

namespace App\Casts;

use App\Domain\Entities\ItemQuestionEntity;
use App\Domain\Interfaces\QuestionCast;
use Illuminate\Support\Facades\Storage;

class ImageQuestionCast implements QuestionCast
{

    public function serialize(ItemQuestionEntity $value): ItemQuestionEntity
    {

        $image =  $value->getImage();

        if ($image) {
            $value->addImage(url(Storage::url(config('app.outputImage') . $image)));
        }

        return $value;
    }
}
