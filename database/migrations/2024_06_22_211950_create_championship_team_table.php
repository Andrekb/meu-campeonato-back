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
        Schema::create('championship_team', function (Blueprint $table) {
            $table->id();
            $table->foreignId('champ_id')->constrained('championships');
            $table->foreignId('team_id')->constrained('teams');
            $table->integer('registration');
            $table->integer('gp')->default(0);
            $table->integer('gc')->default(0);
            $table->integer('points')->default(0);
            $table->integer('position')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('championship_team');
    }
};
