# API PARA EXAMENES DE LICENCIA

## Descripción

API que permite obtener preguntas para exámenes de licencia de conducir en El Salvador.

Consultar la documentación de la API en `/docs`.

## Requisitos

- PHP 8.1
- Composer 2.1

## Instalación

Clonar el repositorio

```bash
git clone https://github.com/epmyas2022/api-exam-driving-sv.git
```

Instalar dependencias

```bash
composer install
```

Para ver el front-end de la API, instalar dependencias de npm

```bash
npm install
```

## Uso

Iniciar servidor de desarrollo

```bash
php artisan serve
```

para el front-end

```bash
npm run dev
```

## Uso de la API

Puedes consutar el swagger de la API en `/docs` (ej. <http://localhost:8000/docs>)

Ejemplo de respuesta de la API:

```json
[
  {
    "id": "d1c82ae4-4d07-4aef-a07b-035df1149f01",
    "category": "libre",
    "total": 5,
    "listQuestions": [
      {
        "id": 22,
        "question": "Para efectos de la Ley de Transporte terrestre, tránsito y seguridad vial, se entiende como vehículos destinados al servicio de Transporte selectivo de pasajeros, únicamente:",
        "image": null,
        "percentage": 1,
        "lifelines": {
          "fifty_fifty": [
            {
              "answer": "Taxis",
              "isCorrect": true
            },
            {
              "answer": "Autobuses",
              "isCorrect": false
            }
          ],
          "public": [
            {
              "answer": "Microbuses",
              "percentage": "12.50"
            },
            {
              "answer": "Autobuses",
              "percentage": "12.50"
            },
            {
              "answer": "Pick-ups",
              "percentage": "31.25"
            },
            {
              "answer": "Taxis",
              "percentage": "43.75"
            }
          ]
        },
        "answers": [
          {
            "answer": "Microbuses",
            "isCorrect": false
          },
          {
            "answer": "Autobuses",
            "isCorrect": false
          },
          {
            "answer": "Pick-ups",
            "isCorrect": false
          },
          {
            "answer": "Taxis",
            "isCorrect": true
          }
        ]
      },
    ]
  }
]
```

Parametros de la API:

| Parametro | Descripción |
| --- | --- |
| `exam` | El tipo de examen a realizar (ej. senalizacion, ley, reglamento, vmt) |
| `size` | La cantidad de preguntas a obtener (default: 5) |

## Front-end de la API

![Front-end](./example.png)
