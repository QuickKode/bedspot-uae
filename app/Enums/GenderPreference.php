<?php

namespace App\Enums;

enum GenderPreference: string
{
    case Male = 'male';
    case Female = 'female';
    case Family = 'family';
    case Any = 'any';

    public function label(): string
    {
        return match ($this) {
            self::Male => 'Men only',
            self::Female => 'Ladies only',
            self::Family => 'Families',
            self::Any => 'Anyone',
        };
    }
}
