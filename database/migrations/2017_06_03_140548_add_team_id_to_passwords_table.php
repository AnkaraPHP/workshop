<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTeamIdToPasswordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('passwords', function (Blueprint $table) {
            $table->integer("team_id")->unsigned();
            $table->foreign("team_id")
                ->references("id")->on("teams")
                ->onDelete("cascade");
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
            $table->dropForeign("passwords_team_id_foreign");
            $table->dropColumn("team_id");
        });
    }
}
