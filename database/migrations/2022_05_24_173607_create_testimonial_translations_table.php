<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonial_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->text('description');
            $table->unsignedBigInteger('testimonial_id');
            $table->string('locale')->index();
            $table->unique(['testimonial_id', 'locale']);
            $table->foreign('testimonial_id')->references('id')->on('testimonials')->onDelete('cascade');
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
        Schema::dropIfExists('testimonial_translations');
    }
}
