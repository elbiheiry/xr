<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSettingTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_translations', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->string('address');
            $table->unsignedBigInteger('setting_id');
            $table->string('locale')->index();
            $table->unique(['setting_id', 'locale']);
            $table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade');
            $table->timestamps();
        });

        DB::table('setting_translations')->insert([
            'description' => 'Lorem ipsum dolor sit amet consetetur sadi scing elitr sed diam nonumy.',
            'address' => 'street, region, city, country',
            'setting_id' => 1,
            'locale' => 'en'
        ]);

        DB::table('setting_translations')->insert([
            'description' => 'Lorem ipsum dolor sit amet consetetur sadi scing elitr sed diam nonumy.',
            'address' => 'street, region, city, country',
            'setting_id' => 1,
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
        Schema::dropIfExists('setting_translations');
    }
}
