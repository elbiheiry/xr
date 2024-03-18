<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInputsToSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solutions', function (Blueprint $table) {
            $table->string('meta_title')->after('slug');
            $table->text('meta_keywords')->after('meta_title');
            $table->text('meta_description')->after('meta_keywords');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solutions', function (Blueprint $table) {
            //
        });
    }
}
