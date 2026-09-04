<?php

namespace App\Enums;

enum ListingStatus: string
{
    case Draft = 'draft';
    case Pending = 'pending';
    case Approved = 'approved';
    case Rejected = 'rejected';
    case Unavailable = 'unavailable';

    public function label(): string
    {
        return match ($this) {
            self::Draft => 'Draft',
            self::Pending => 'Pending review',
            self::Approved => 'Live',
            self::Rejected => 'Rejected',
            self::Unavailable => 'Unavailable',
        };
    }

    public function badgeClass(): string
    {
        return match ($this) {
            self::Draft => 'bg-secondary',
            self::Pending => 'bg-warning text-dark',
            self::Approved => 'bg-success',
            self::Rejected => 'bg-danger',
            self::Unavailable => 'bg-dark',
        };
    }
}
