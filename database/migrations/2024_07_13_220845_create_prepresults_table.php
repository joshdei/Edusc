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
        Schema::create('prepresults', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('subject_id');
            $table->string('teacher_id');
            $table->string('term1');
            $table->string('term2');
            $table->string('exam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prepresults');
    }
};
