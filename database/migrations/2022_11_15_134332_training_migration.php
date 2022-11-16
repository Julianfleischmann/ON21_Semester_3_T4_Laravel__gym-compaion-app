<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->decimal('training_weight');
            $table->decimal('training_redo');
            // User, der das Training anlegt wird der Tabelle hinzugefügt
            // Aus Laravel-Doku
            $table->unsignedBigInteger('training_user_id');
            $table->foreign('training_user_id')->references('id')->on('users');
            $table->timestamp('training_created_at')->nullable();
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
