<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectIdToFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('files', function (Blueprint $table) {
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
        Schema::table('files', function (Blueprint $table) {
            $table->dropForeign("files_project_id_foreign");
            $table->dropColumn("project_id");
        });
    }
}
