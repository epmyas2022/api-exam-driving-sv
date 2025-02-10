<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\QuestionEntity;
use App\Domain\Interfaces\GrudRepository;

abstract class ExamRepository implements GrudRepository
{
    public function all() {}

    public function create(array $data) {}

    public function update(array $data, $id) {}

    public function delete($id) {}

    /**
     * Get question
     * @param string $type
     * @return QuestionEntity
     */
    public function question(?string $type){}

    public function find($id) {}
}
