<?php

namespace App\Domain\Services;

use App\Domain\Entities\QuestionEntity;
abstract class PersistenceService
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
}
