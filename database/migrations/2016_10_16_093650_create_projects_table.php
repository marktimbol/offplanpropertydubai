<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('developer_id')->unsigned();
            $table->string('name');
            $table->string('title');
            $table->string('slug')->unique();
            
            $table->string('country');
            $table->string('city');
            $table->string('community');

            $table->string('latitude');
            $table->string('longitude');

            $table->string('dld_project_completion_link');
            $table->string('project_escrow_account_details_link');
            
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
