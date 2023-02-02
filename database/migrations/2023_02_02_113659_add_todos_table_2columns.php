<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTodosTable2columns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('todos', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->unsignedBigInteger('user_id')->after('id');

            $table->integer('tag_id')->unsigned();
            $table->unsignedBigInteger('tag_id')->after('content');

            $table-> foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tag_id')->references ('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('todos', function (Blueprint $table) {
            $table -> dropColumn(('user_id'));
            $table -> dropColumn('tag_id');
        });
    }
}
