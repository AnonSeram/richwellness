<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('answer');
            $table->string('language', 2)->default('id');
            $table->timestamps();

            // Add indexes
            $table->index('language');
            $table->fullText(['question', 'answer']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('faqs');
    }
}; 