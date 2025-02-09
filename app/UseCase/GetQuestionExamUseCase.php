<?php

namespace App\UseCase;

use App\Domain\Entities\QuestionEntity;
use App\Domain\Repositories\ExamRepository;
use App\Domain\Services\PersistenceService;

class GetQuestionExamUseCase
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


    public function execute(): ?QuestionEntity
    {
        $question =  $this->examRepository->question();

        $exist = $this->persistenceService->find($question?->getId());

        if (!$exist) {
            $this->persistenceService->save($question);
        }

        return $question;
    }
}
