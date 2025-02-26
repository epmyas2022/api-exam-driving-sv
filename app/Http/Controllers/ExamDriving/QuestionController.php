<?php

namespace App\Http\Controllers\ExamDriving;

use App\Http\Controllers\Controller;
use App\Http\Mock\QuestionMock;
use App\Http\Requests\v1\FilterQuestionRequest;
use App\UseCase\GetQuestionsExamUseCase;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Laravel\Swagger\Attributes\SwaggerResponse;
use Laravel\Swagger\Attributes\SwaggerSection;
use Laravel\Swagger\Attributes\SwaggerSummary;
use App\Enums\ExamType;
use App\Http\Requests\v1\UIQuestionsRequest;
use App\Utils\ExamUtil;

#[SwaggerSection("Question")]
class QuestionController extends Controller
{
    private GetQuestionsExamUseCase $getQuestionUseCase;

    public function __construct(GetQuestionsExamUseCase $getQuestionUseCase)
    {
        $this->getQuestionUseCase = $getQuestionUseCase;
    }

    #[SwaggerSummary("Get question exam and save in persistence")]
    #[SwaggerResponse(QuestionMock::INDEX)]
    public function index(FilterQuestionRequest $request): JsonResponse
    {
        $questions = $this->getQuestionUseCase->execute($request->exam, $request->size);

        return response()->json($questions, 200, [], JSON_UNESCAPED_SLASHES);
    }

    public function ui(UIQuestionsRequest $request): View
    {

        $currentQuestion = $request->currentQuestion ?? -1;

        if (ExamUtil::isMaxTimeExpired()) {
            return view('exam-expired');
        }

        $questions = $this->getQuestionUseCase->execute($request?->exam ??
            ExamType::GENERAL->toStr(), $request->size);

        if (count($questions) - 1 < $request->currentQuestion) {
            $currentQuestion = -1;
        }

        return view('questions', array_merge(
            $questions,
            [
                'currentQuestion' => $currentQuestion + 1,
                'time' => ExamUtil::remainingTime()
            ]
        ));
    }


    public function uiCategories(): View
    {
        return view('categories');
    }
}
