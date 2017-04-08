<?php

use App\Project;
use App\ProjectTranslation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->string('locale')->index();
            
            $table->string('name');
            $table->string('title');
            $table->string('price');
            $table->string('expected_completion_date');
            $table->text('description');

            $table->unique(['project_id', 'locale']);
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade');
            $table->timestamps();
        });

        $projects = Project::all();
        foreach( $projects as $project )
        {
            ProjectTranslation::create([
                'project_id'    => $project->id,
                'locale'    => 'en',
                'name'  => $project->name,
                'title' => $project->title,
                'price' => $project->price,
                'expected_completion_date'  => $project->expected_completion_date,
                'description'   => $project->description
            ]);           
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_translations');
    }
}
