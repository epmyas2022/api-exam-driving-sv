<?php

namespace App\UseCase;

use App\Domain\Entities\QuestionEntity;
use App\Domain\Repositories\ExamRepository;
use App\Domain\Services\PersistenceService;

class GetQuestionsExamUseCase
{
    private ExamRepository $examRepository;
    private PersistenceService $persistenceService;

    public function __construct(
        ExamRepository $examRepository,
        PersistenceService $persistenceService
    ) {
        $this->examRepository = $examRepository;
        $this->persistenceService = $persistenceService;
    }


    /**
     * Get all questions
     * @param string|null $type
     * @return array<QuestionEntity>
     */
    public function execute(?string $type)
    {
        $question =  $this->examRepository->question($type);

        $exist = $this->persistenceService->find($question?->getId());

        if (!$exist) {
            $this->persistenceService->save($question);
        }

        return $this->persistenceService->all();
    }
}
