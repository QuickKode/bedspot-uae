<?php

namespace App\Models;

use App\Enums\GenderPreference;
use App\Enums\ListingStatus;
use App\Enums\RoomType;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'title',
    'description',
    'emirate',
    'area',
    'address',
    'monthly_rent',
    'security_deposit',
    'bills_included',
    'room_type',
    'gender_preference',
    'total_beds',
    'available_beds',
    'house_rules',
])]
class Listing extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'monthly_rent' => 'decimal:2',
            'security_deposit' => 'decimal:2',
            'bills_included' => 'boolean',
            'room_type' => RoomType::class,
            'gender_preference' => GenderPreference::class,
            'status' => ListingStatus::class,
            'approved_at' => 'datetime',
        ];
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $attributes = [
        'status' => 'pending',
        'bills_included' => false,
    ];
}
