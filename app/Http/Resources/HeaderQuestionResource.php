<?php

namespace App\Http\Resources;

use App\Enums\ExamType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Ramsey\Uuid\Uuid;

class HeaderQuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => Uuid::uuid4(),
            'category' => ExamType::fromString($request->exam),
            'total' => $this->resource->count(),
            'listQuestions' => $this->resource
        ];
    }
}
