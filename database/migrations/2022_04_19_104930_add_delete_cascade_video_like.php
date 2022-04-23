<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeleteCascadeVideoLike extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('video_likes', function (Blueprint $table) {
            $table->dropForeign('video_id');
            $table->dropForeign('liker_id');

            
            $table->foreignId('video_id')
            ->cascadeOnDelete()
            ->change();

            $table->foreignId('liker_id')
            ->cascadeOnDelete()
            ->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('video_likes', function (Blueprint $table) {
            //
        });
    }
}
