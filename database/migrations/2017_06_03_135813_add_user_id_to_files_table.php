<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('files', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign("user_id")
                  ->references("id")->on("users")
                  ->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('files', function (Blueprint $table) {
            $table->dropForeign("files_user_id_foreign");
            $table->dropColumn("user_id");
        });
    }
}
