<?php
/**
 * Configuración de Swagger
 * Este archivo contiene la configuración de Swagger para la documentación de la API
 */

use Laravel\Swagger\Constants\ThemeSwagger;

return [
    'options' => [
        'theme' =>  env('SWAGGER_THEME', ThemeSwagger::X_CODE_LIGHT),
    ],
    'document' => [
        'openapi' => '3.1.1',
        'info' => [
            'title' => env('APP_NAME', 'API'),
            'version' => env('APP_VERSION', '1.0.0'),
            'description' => env('APP_DESCRIPTION', 'API Documentation'),
            'contact' => [
                'email' => 'castillo20182017@gmail.com',
            ],
        ],
        'servers' => [],
        "components" =>  [
            "securitySchemes" =>  [
                "bearerAuth" =>  [
                    "type" =>  "http",
                    "scheme" =>  "bearer",
                    "bearerFormat" =>  "JWT"
                ],
                'basicAuth' => [
                    'type' => 'http',
                    'scheme' => 'basic'
                ]
            ]
        ],
        'paths' => [],
    ],

];
