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
        Schema::create('letter_histories', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string('letter_number')->unique();
            $table->unsignedInteger('number_sequence')->unique();
            $table->string('sender');
            $table->string('letter_type');
            $table->date('letter_date');
            $table->string('recipient');
            $table->foreignUuid('created_by')->constrained('users')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letter_histories');
    }
};