<?php

use App\Community;
use App\CommunityTranslation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunityTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('community_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->text('description');
            $table->unique(['community_id', 'locale']);
            $table->foreign('community_id')->references('id')->on('communities')->onDelete('cascade');
            $table->timestamps();
        });

        $communities = Community::all();
        foreach( $communities as $community )
        {
            CommunityTranslation::create([
                'community_id'    => $community->id,
                'locale'    => 'en',
                'name'  => $community->name,
                'description'  => $community->description,
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
        Schema::dropIfExists('community_translations');
    }
}
