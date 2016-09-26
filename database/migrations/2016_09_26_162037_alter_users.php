<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('albums', function($table)
        {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id', 'albums_user_id_foreign')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('albums', function($table)
        {
            $table->dropForeign('albums_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}
