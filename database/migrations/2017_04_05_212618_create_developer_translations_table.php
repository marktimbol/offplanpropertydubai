<?php

use App\Developer;
use App\DeveloperTranslation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeveloperTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developer_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('developer_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->text('profile');
            $table->unique(['developer_id', 'locale']);
            $table->foreign('developer_id')->references('id')->on('developers')->onDelete('cascade');
            $table->timestamps();
        });

        $developers = Developer::all();
        foreach( $developers as $developer )
        {
            DeveloperTranslation::create([
                'developer_id'    => $developer->id,
                'locale'    => 'en',
                'name'  => $developer->name,
                'profile'   => $developer->profile
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
        Schema::dropIfExists('developer_translations');
    }
}
