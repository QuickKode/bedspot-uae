<?php

namespace Database\Factories;

use App\Enums\GenderPreference;
use App\Enums\ListingStatus;
use App\Enums\RoomType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ListingFactory extends Factory
{
    private array $locations = [
        'Dubai' => ['Bur Dubai', 'Deira', 'Al Nahda', 'Al Qusais', 'Karama', 'International City', 'Al Barsha', 'Discovery Gardens'],
        'Sharjah' => ['Al Nahda', 'Al Majaz', 'Rolla'],
        'Abu Dhabi' => ['Mussafah', 'Khalifa City'],
    ];

    private array $rentRanges = [
        'bedspace' => [500, 900],
        'partition' => [1000, 1600],
        'shared_room' => [900, 1500],
        'private_room' => [1800, 3000],
        'studio' => [2500, 4500],
    ];

    public function definition(): array
    {
        $emirate = fake()->randomElement(array_keys($this->locations));
        $area = fake()->randomElement($this->locations[$emirate]);
        $roomType = fake()->randomElement(RoomType::cases());

        [$min, $max] = $this->rentRanges[$roomType->value];
        $rent = fake()->numberBetween($min / 50, $max / 50) * 50;

        $totalBeds = $roomType === RoomType::Bedspace
            ? fake()->numberBetween(2, 6)
            : 1;

        $perk = fake()->randomElement(['near metro', 'with balcony', 'bills included', 'fully furnished', 'family building']);
        $title = "{$roomType->label()} in {$area} {$perk}";

        return [
            'user_id' => User::factory()->state(['role' => 'owner']),
            'title' => $title,
            'slug' => Str::slug($title).'-'.fake()->unique()->numberBetween(1000, 9999),
            'description' => fake()->paragraphs(2, true),
            'emirate' => $emirate,
            'area' => $area,
            'address' => fake()->buildingNumber().' '.fake()->streetName(),
            'monthly_rent' => $rent,
            'security_deposit' => fake()->boolean(70) ? $rent : null,
            'bills_included' => fake()->boolean(40),
            'room_type' => $roomType,
            'gender_preference' => fake()->randomElement(GenderPreference::cases()),
            'total_beds' => $totalBeds,
            'available_beds' => fake()->numberBetween(1, $totalBeds),
            'house_rules' => fake()->boolean(60)
                ? 'No smoking. No pets. Visitors not allowed after 10pm.'
                : null,
            'status' => ListingStatus::Pending,
        ];
    }

    public function approved(): static
    {
        return $this->state(fn () => [
            'status' => ListingStatus::Approved,
            'approved_at' => now(),
        ]);
    }

    public function rejected(): static
    {
        return $this->state(fn () => [
            'status' => ListingStatus::Rejected,
            'rejection_reason' => 'Photos did not match the description.',
        ]);
    }
}
