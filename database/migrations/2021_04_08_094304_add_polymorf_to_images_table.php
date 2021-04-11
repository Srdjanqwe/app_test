<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPolymorfToImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn('blogposts_id');
            $table->morphs('imageable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->unsignedBigInteger('blogposts_id')->nullable();
            $table->dropMorphs('imageable');
        });
    }
}
