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
        Schema::create('trainings', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("p_title", length: 255);
            $table->text("p_content");
            $table->string("p_image");
            $table->enum("p_type_training", ["offline", "online"]);
            $table->string("p_location");
            $table->dateTime("p_start_date");
            $table->dateTime("p_end_date");
            $table->enum("p_status", ["active", "non-active", "on going", "ended"])->default("active");
            $table->enum("p_forum_scale", ["internal", "eksternal"]);
            $table->integer("p_kuota");
            $table->integer("p_is_public");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
