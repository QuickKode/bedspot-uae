<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;

class ListingSeeder extends Seeder
{
    public function run(): void
    {
        $owners = collect([
            ['name' => 'Rashid Al Marzooqi', 'email' => 'rashid@bedspot.test'],
            ['name' => 'Priya Nair',         'email' => 'priya@bedspot.test'],
            ['name' => 'Ahmed Khan',         'email' => 'ahmed@bedspot.test'],
        ])->map(fn ($data) => User::firstOrCreate(
            ['email' => $data['email']],
            [
                'name' => $data['name'],
                'password' => 'password123',
                'role' => UserRole::Owner,
                'phone' => '05'.fake()->numerify('########'),
            ]
        ));

        foreach ($owners as $owner) {
            Listing::factory()->count(6)->approved()->create(['user_id' => $owner->id]);
            Listing::factory()->count(2)->create(['user_id' => $owner->id]);
        }

        Listing::factory()->rejected()->create(['user_id' => $owners->first()->id]);
    }
}
