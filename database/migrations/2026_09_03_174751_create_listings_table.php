<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');

            $table->string('emirate', 50);
            $table->string('area', 100)->index();
            $table->string('address')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            $table->decimal('monthly_rent', 10, 2);
            $table->decimal('security_deposit', 10, 2)->nullable();
            $table->boolean('bills_included')->default(false);

            $table->enum('room_type', ['bedspace', 'partition', 'shared_room', 'private_room', 'studio']);
            $table->enum('gender_preference', ['male', 'female', 'family', 'any'])->default('any');

            $table->unsignedTinyInteger('total_beds');
            $table->unsignedTinyInteger('available_beds');
            $table->text('house_rules')->nullable();

            $table->enum('status', ['draft', 'pending', 'approved', 'rejected', 'unavailable'])->default('pending');
            $table->string('rejection_reason', 500)->nullable();
            $table->timestamp('approved_at')->nullable();

            $table->timestamps();

            $table->index(['status', 'area', 'monthly_rent']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
