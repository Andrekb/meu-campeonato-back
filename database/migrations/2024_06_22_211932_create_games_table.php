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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('home_id')->constrained('teams');
            $table->foreignId('away_id')->constrained('teams');
            $table->foreignId('champ_id')->constrained('championships');
            $table->foreignId('winner_id')->constrained('teams');
            $table->integer('home_goals')->default(0);
            $table->integer('away_goals')->default(0);
            $table->enum('match_type', ['quarters', 'semis', 'final', 'third_place']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
