<?php

namespace App\Http\Mock;

class QuestionMock
{
    const INDEX = [[
        "id" => "e6c9b21f-4570-49f9-bb70-c1a200496049",
        "category" => "vmt",
        "total" => 5,
        "listAnswer" => [
            [
                "id" => 445,
                "question" => "¿Cuál es el nombre de esta señal?",
                "image" => "..\/img\/444.png",
                "percentage" => 3.3333333333333335,
                "answers" => [
                    [
                        "answer" => "Giro a la izquierda",
                        "isCorrect" => false
                    ],
                    [
                        "answer" => "Curva en S",
                        "isCorrect" => false
                    ],
                    [
                        "answer" => "Curva en media S",
                        "isCorrect" => false
                    ],
                    [
                        "answer" => "Curva pronunciada en sentido contrario",
                        "isCorrect" => true
                    ]
                ]
            ],


        ]
    ]];
}
