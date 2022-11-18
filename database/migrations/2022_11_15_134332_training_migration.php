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
            $table->decimal('weight');
            $table->decimal('repetition');

            // Foreign Keys start
            // Schema aus Laravel-Doku
            $table->unsignedBigInteger('name');
            $table->foreign('name')->references('id')->on('training_names');

            // User, der das Training anlegt wird der Tabelle hinzugefügt
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            // Foreign Keys end

            $table->timestamp('created_at')->nullable();
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
