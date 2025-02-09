<?php

namespace App\Repositories;

use App\Domain\Entities\QuestionEntity;
use App\Domain\Repositories\ExamRepository;
use App\Mapper\QuestionMapper;
use Illuminate\Support\Facades\Http;

class RemoteExamRepository extends ExamRepository
{


    public function question(): ?QuestionEntity
    {
        $response = Http::asMultipart()
            ->post(config('app.externalAPI') . '/prueba.php', [
                "exam" => "senalizacion"
            ]);

        $data = $response->json();

        if ($response->failed() || !$data['exito']) {
            return null;
        }

        return QuestionMapper::toEntity($data);
    }
}
