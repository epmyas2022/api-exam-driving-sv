<?php

namespace App\Repositories;

use App\Domain\Entities\QuestionEntity;
use App\Domain\Repositories\ExamRepository;
use App\Enums\ExamType;
use App\Mapper\QuestionMapper;
use App\Mapper\QuestionResponseMapper;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class RemoteExamRepository extends ExamRepository
{
    public function questions(?string $type): ?QuestionEntity
    {
        $response = Http::asMultipart()
            ->post(config('app.externalAPI') . '/prueba.php', [
                "exam" => ExamType::fromString($type)
            ]);

        $data = $response->json();

        if ($response->failed() || !$data['exito']) {
            return null;
        }

        $data['objeto']['idCategoria'] = ExamType::fromString($type);

        $questionResponse = QuestionResponseMapper::from($data);

        return $questionResponse->toEntity();
    }
}
