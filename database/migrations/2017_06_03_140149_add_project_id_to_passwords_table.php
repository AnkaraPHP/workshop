<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectIdToPasswordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('passwords', function (Blueprint $table) {
            $table->integer("project_id")->unsigned()->nullable();
            $table->foreign("project_id")
                  ->references("id")->on("projects")
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
        Schema::table('passwords', function (Blueprint $table) {
            $table->dropForeign("passwords_project_id_foreign");
            $table->dropColumn("project_id");
        });
    }
}
