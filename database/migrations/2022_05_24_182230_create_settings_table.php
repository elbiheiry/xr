<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->string('email');
            $table->string('whatsapp');
            $table->string('image');
            $table->text('map');
            $table->timestamps();
        });

        DB::table('settings')->insert([
            'phone' => '+201000998533',
            'email' => 'contact@newlevelxr.com',
            'whatsapp' => '+1 (514) 312-5678',
            'image' => 'talk.png',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.350823243397!2d31.454234614727298!3d30.055476881878313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583cc3ffffffff%3A0x2319276a5e9e872b!2sThe%20first%20assembly%20_%20Southern%20youth!5e0!3m2!1sen!2seg!4v1652704549850!5m2!1sen!2seg'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
