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
        Schema::create('forms', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid("user_id")->constrained("users");
            $table->string('nip')->unique()->nullable();
            $table->date('dob')->nullable();
            $table->enum("religion", ["islam", "christian", "catholic", "hindu", "buddha", "konghucu", "other"])->nullable();
            $table->string('phone')->unique()->nullable();
            $table->enum('last_education', ['sma', 'd3', 'd4/s1', 's2', 's3'])->nullable();
            $table->string('last_education_major')->nullable();
            $table->string('last_education_institution')->nullable();
            $table->string('work_unit')->nullable();
            $table->foreignUuid('position_id')->constrained('positions')->nullable();
            $table->foreignUuid('instance_id')->constrained('instances')->nullable();
            $table->foreignUuid('golongan_id')->constrained('golongans')->nullable();
            $table->foreignUuid('skill_id')->constrained('skills')->nullable();
            $table->foreignId('province_id')->constrained('provinces')->nullable();
            $table->foreignId('district_id')->constrained('districts')->nullable();
            $table->foreignId('subdistrict_id')->constrained('subdistricts')->nullable();
            $table->foreignId('village_id')->constrained('villages')->nullable();
            $table->text('address')->nullable();
            $table->foreignUuid('period_id')->constrained('periods')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->foreignUuid('updated_by')->constrained('users')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};