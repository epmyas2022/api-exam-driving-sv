<?php

namespace App\Repositories;

use App\Domain\Entities\QuestionEntity;
use App\Domain\Repositories\ExamRepository;
use App\Mapper\QuestionMapper;
use App\Mapper\QuestionResponseMapper;
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

        $questionResponse = QuestionResponseMapper::from($data);

        return $questionResponse->toEntity();
    }
}
