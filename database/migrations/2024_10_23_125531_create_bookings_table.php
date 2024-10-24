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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');
            $table->foreignId('driver_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('approved_by_1')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('approved_by_2')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('rejected_by_1')->nullable()->constrained('users')->onDelete('cascade');
            $table->enum('status', ['pending', 'approved_by_1', 'fully_approved', 'rejected'])->default('pending');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('purpose')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
