<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTranslatableColumnsInProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['name', 'title', 'price', 'expected_completion_date', 'description']);
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
            $table->string('name')->after('developer_id')->nullable();
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->string('title')->after('name')->nullable();
            $table->string('price')->after('slug')->nullable();
            $table->string('expected_completion_date')->after('longitude')->nullable();
            $table->text('description')->after('project_escrow_account_details_link')->nullable();
        });        
    }
}
