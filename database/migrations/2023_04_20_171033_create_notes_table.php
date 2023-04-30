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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->text('description');
//            $table->unsignedBigInteger('curricula_id')->nullable();
//            $table->unsignedBigInteger('exam_id')->nullable();
//            $table->unsignedBigInteger('user_id')->nullable();
//            $table->unsignedBigInteger('lead_id')->nullable();
            $table->timestamps();

//            $table->foreign('curricula_id')->references('id')->on('curricula')->onDelete('cascade');
//            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
        });

        Schema::create('lead_note', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lead_id')->nullable();
            $table->unsignedBigInteger('note_id')->nullable();
            $table->timestamps();
            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
            $table->foreign('note_id')->references('id')->on('notes')->onDelete('cascade');
        });

        Schema::create('curricula_note', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curricula_id')->nullable();
            $table->unsignedBigInteger('note_id')->nullable();
            $table->timestamps();
            $table->foreign('curricula_id')->references('id')->on('curricula')->onDelete('cascade');
            $table->foreign('note_id')->references('id')->on('notes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
