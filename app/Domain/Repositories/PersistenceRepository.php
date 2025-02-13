<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\QuestionEntity;
abstract class PersistenceRepository
{
    public function save(QuestionEntity $data) {}
    public function update(QuestionEntity $data, int $id) {}

    /**
     * Find question by id
     * @param int $id
     * @return QuestionEntity|null
     */
    public function find(int $id) {}
    public function delete(int $id) {}

    /**
     * Get all questions
     * @return array<QuestionEntity>
     */

    public function all(?string $type, ?int $number) {}
}
