<?php

namespace App\Http\Controllers\ExamDriving;

use App\Http\Controllers\Controller;
use App\Http\Mock\QuestionMock;
use App\UseCase\GetQuestionExamUseCase;
use Illuminate\Http\JsonResponse;
use Laravel\Swagger\Attributes\SwaggerResponse;
use Laravel\Swagger\Attributes\SwaggerSection;
use Laravel\Swagger\Attributes\SwaggerSummary;

#[SwaggerSection("Question")]
class QuestionController extends Controller
{
    private GetQuestionExamUseCase $getQuestionUseCase;

    public function __construct(GetQuestionExamUseCase $getQuestionUseCase)
    {
        $this->getQuestionUseCase = $getQuestionUseCase;
    }

    #[SwaggerSummary("Get question exam and save in persistence")]
    #[SwaggerResponse(QuestionMock::INDEX)]
    public function index(): JsonResponse
    {
        $question = $this->getQuestionUseCase->execute();

        return response()->json($question->toArray());
    }
}
