<?php

namespace App\Enums;

enum ExamType: string
{
    case SIGNALIZATION = 'senalizacion';
    case  GENERAL = 'libre';
    case TRANSPORTATION = 'ley';
    case GENERAL_REGULATION = 'reglamento';
    case VMT = 'vmt';
    case PSYCHOLOGICAL = 'psicologico';


    /**
     * Method for trying to get the value of the enum from a string
     * @param string $value
     * @param self $default
     * @return string
     */
    public static function fromString(?string $value, self $default = ExamType::GENERAL): string
    {
        if($value === null) {
            return $default->value;
        }
        return self::tryFrom($value)?->value ?? $default?->value;
    }


    public function toStr(): string
    {
        return $this->value;
    }
}
