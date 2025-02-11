<?php

namespace App\UseCase;

use App\Domain\Entities\QuestionEntity;
use App\Domain\Repositories\ExamRepository;
use App\Domain\Repositories\PersistenceRepository;

class GetQuestionsExamUseCase
{
    private ExamRepository $examRepository;
    private PersistenceRepository $persistenceRepository;

    public function __construct(
        ExamRepository $examRepository,
        PersistenceRepository $persistenceRepository
    ) {
        $this->examRepository = $examRepository;
        $this->persistenceRepository = $persistenceRepository;
    }


    /**
     * Get all questions
     * @param string|null $type
     * @return array<QuestionEntity>
     */
    public function execute(?string $type)
    {
        $question =  $this->examRepository->question($type);

        $exist = $this->persistenceRepository->find($question?->getId());

        if (!$exist) {
            $this->persistenceRepository->save($question);
        }

        return $this->persistenceRepository->all();
    }
}
