<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('education');
            $table->string('field');
            $table->string('street_address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('country');
            $table->string('phone');
            $table->string('profile_photo');
            $table->string('linkedin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};