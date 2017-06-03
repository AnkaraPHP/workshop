<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTeamIdToTeamUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('team_users', function (Blueprint $table) {
            $table->integer("team_id")->unsigned()->after("id");

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
        Schema::table('team_users', function (Blueprint $table) {
            $table->dropForeign("team_users_team_id_foreign");
            $table->dropColumn("team_id");
        });
    }
}
