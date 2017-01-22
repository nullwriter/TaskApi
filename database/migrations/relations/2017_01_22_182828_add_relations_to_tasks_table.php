<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationsToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function(Blueprint $table)
        {
            $table->foreign('user_id', 'user_ibfk_1')->references('id')->on('users');
            $table->foreign('priority_id', 'priority_ibfk_2')->references('id')->on('priorities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function(Blueprint $table)
        {
            $table->dropForeign('user_ibfk_1');
            $table->dropForeign('priority_ibfk_1');
        });
    }
}
