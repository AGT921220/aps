<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUsersIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->increments('id')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropPrimary('users_id_primary');
            $table->integer('id')->change();
            $table->primary('id');
        });
    }
}


/*
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropPrimary('users_id_primary');
            $table->increments('id')->change();
        });
        // DB::statement('ALTER TABLE users MODIFY id INT AUTO_INCREMENT');
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropPrimary('users_id_primary');
            $table->integer('id')->change();
            $table->primary('id');
        });
        // DB::statement('ALTER TABLE users MODIFY id INT');
    }

*/
