<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solution_translations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->text('brief');
            $table->unsignedBigInteger('solution_id');
            $table->string('locale')->index();
            $table->unique(['solution_id', 'locale']);
            $table->foreign('solution_id')->references('id')->on('solutions')->onDelete('cascade');
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
        Schema::dropIfExists('solution_translations');
    }
}
