<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('imt_eids', function (Blueprint $table) {
            $table->id();

            $table->date('ph_date');
            $table->time('ph_time');

            $table->string('ctrl_number')->unique();

            $table->string('full_name');
            $table->string('imt_position');
            $table->string('office_designation');
            $table->string('office_agency');
            $table->string('contact_number')->nullable();
            $table->string('place_assignment');

            $table->string('photo_path')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('imt_eids');
    }
};
