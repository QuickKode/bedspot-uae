<?php

namespace App\Enums;

enum UserRole: string
{
    case Seeker = 'seeker';
    case Owner  = 'owner';
    case Admin  = 'admin';

    public function label(): string
    {
        return match ($this) {
            self::Seeker => 'Accommodation Seeker',
            self::Owner  => 'Property Owner',
            self::Admin  => 'Administrator',
        };
    }
}