<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustomerIdToProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')
                  ->references("id")->on("customers")
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
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign("projects_customer_id_foreign");
            $table->dropColumn("customer_id");
        });
    }
}
