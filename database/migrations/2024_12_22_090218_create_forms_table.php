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
            $table->string('new_member_number')->unique()->nullable();
            $table->enum("religion", ["islam", "christian", "catholic", "hindu", "buddha", "konghucu", "other"])->nullable();
            $table->string('phone')->unique()->nullable();
            $table->enum('last_education', ['sma', 'd3', 'd4/s1', 's2', 's3'])->nullable();
            $table->string('last_education_major')->nullable();
            $table->string('last_education_institution')->nullable();
            $table->string('work_unit')->nullable();
            $table->foreignUuid('position_id')->nullable()->default(null)->constrained('positions');
            $table->foreignUuid('instance_id')->nullable()->default(null)->constrained('instances');
            $table->foreignUuid('golongan_id')->nullable()->default(null)->constrained('golongans');
            $table->foreignUuid('skill_id')->nullable()->default(null)->constrained('skills');
            $table->foreignId('province_id')->nullable()->default(null)->constrained('provinces');
            $table->foreignId('district_id')->nullable()->default(null)->constrained('districts');
            $table->foreignId('subdistrict_id')->nullable()->default(null)->constrained('subdistricts');
            $table->foreignId('village_id')->nullable()->default(null)->constrained('villages');
            $table->text('address')->nullable();
            $table->foreignUuid('period_id')->constrained('periods')->nullable();
            $table->text('payment_proof')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('reason')->nullable();
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