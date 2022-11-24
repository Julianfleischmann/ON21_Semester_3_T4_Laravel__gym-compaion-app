<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Legt die Tabelle trainings an.
 * Aufbau und Datenmodell in der Dokumentation beschrieben.
 */

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->decimal('weight');
            $table->decimal('repetition');

            // Foreign Keys start
            // Schema aus Laravel-Doku
            $table->unsignedBigInteger('name_id');
            $table->foreign('name_id')->references('id')->on('training_names');

            // User, der das Training anlegt wird der Tabelle hinzugefügt
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            // Foreign Keys Ende
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainings');
    }
};
