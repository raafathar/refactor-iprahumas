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
        Schema::create('registration_trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid("training_id")->constrained("trainings");
            $table->foreignUuid("user_id")->nullable()->constrained("users");
            $table->string("rp_nama_lengkap")->nullable();
            $table->string("rp_email")->nullable();
            $table->string("rp_nomor_wa")->nullable();
            $table->string("rp_alamat")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_trainings');
    }
};
