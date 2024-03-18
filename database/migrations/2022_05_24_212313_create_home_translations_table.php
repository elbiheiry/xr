<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateHomeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_translations', function (Blueprint $table) {
            $table->id();
            //first section
            $table->string('title1');
            $table->text('description1');
            //solutions section
            $table->string('title2');
            $table->text('description2');
            //article section
            $table->string('title3');
            //team section
            $table->string('title4');
            $table->text('description4');
            //testimonials section
            $table->string('title5');
            $table->text('description5');
            
            $table->unsignedBigInteger('home_id');
            $table->string('locale')->index();
            $table->unique(['home_id', 'locale']);
            $table->foreign('home_id')->references('id')->on('homes')->onDelete('cascade');
            $table->timestamps();
        });

        DB::table('home_translations')->insert([
            'title1' => '1',
            'description1' => '1',
            'title2' => '2',
            'description2' => '2',
            'title3' => '3',
            'title4' => '4',
            'description4' => '4',
            'title5' => '5',
            'description5' => '5',
            'home_id' => 1,
            'locale' => 'en'
        ]);
        DB::table('home_translations')->insert([
            'title1' => '1',
            'description1' => '1',
            'title2' => '2',
            'description2' => '2',
            'title3' => '3',
            'title4' => '4',
            'description4' => '4',
            'title5' => '5',
            'description5' => '5',
            'home_id' => 1,
            'locale' => 'ar'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_translations');
    }
}
