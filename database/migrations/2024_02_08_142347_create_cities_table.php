<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('city_id')->nullable()->unique()->index();
            $table->string('province_id');
            $table->enum('type', ['Kabupaten', 'Kota']);
            $table->string('city_name');
            $table->string('postal_code');
            $table->timestamps();

            $table->foreign('province_id')->references('province_id')->on('provinces')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
