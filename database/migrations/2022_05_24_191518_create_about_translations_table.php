<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAboutTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_translations', function (Blueprint $table) {
            $table->id();
            $table->string('title1');
            $table->text('description1');
            $table->string('title2');
            $table->text('description2');
            $table->string('title3');
            $table->text('description3');
            $table->string('title4');
            $table->text('description4');
            $table->unsignedBigInteger('about_id');
            $table->string('locale')->index();
            $table->unique(['about_id', 'locale']);
            $table->foreign('about_id')->references('id')->on('abouts')->onDelete('cascade');
            $table->timestamps();
        });

        DB::table('about_translations')->insert([
            'title1' => 'New level XR Immersive Solutions',
            'description1' => 'We partner with world-class SaaS companies to bring you ready-made solutions and guide you to do your metaverse intelligent environments and applications with the best engineers and developers from around the world!',
            'title2' => 'New level XR Immersive Solutions',
            'description2' => 'We partner with world-class SaaS companies to bring you ready-made solutions and guide you to do your metaverse intelligent environments and applications with the best engineers and developers from around the world!',
            'title3' => 'New level XR Immersive Solutions',
            'description3' => 'We partner with world-class SaaS companies to bring you ready-made solutions and guide you to do your metaverse intelligent environments and applications with the best engineers and developers from around the world!',
            'title4' => 'New level XR Immersive Solutions',
            'description4' => 'We partner with world-class SaaS companies to bring you ready-made solutions and guide you to do your metaverse intelligent environments and applications with the best engineers and developers from around the world!',
            'locale' => 'en',
            'about_id' => 1
        ]);

        DB::table('about_translations')->insert([
            'title1' => 'New level XR Immersive Solutions',
            'description1' => 'We partner with world-class SaaS companies to bring you ready-made solutions and guide you to do your metaverse intelligent environments and applications with the best engineers and developers from around the world!',
            'title2' => 'New level XR Immersive Solutions',
            'description2' => 'We partner with world-class SaaS companies to bring you ready-made solutions and guide you to do your metaverse intelligent environments and applications with the best engineers and developers from around the world!',
            'title3' => 'New level XR Immersive Solutions',
            'description3' => 'We partner with world-class SaaS companies to bring you ready-made solutions and guide you to do your metaverse intelligent environments and applications with the best engineers and developers from around the world!',
            'title4' => 'New level XR Immersive Solutions',
            'description4' => 'We partner with world-class SaaS companies to bring you ready-made solutions and guide you to do your metaverse intelligent environments and applications with the best engineers and developers from around the world!',
            'locale' => 'ar',
            'about_id' => 1
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_translations');
    }
}
