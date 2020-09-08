<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->unsignedBigInteger('sport_id');
            $table->string('sport_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            // $table->foreign('sport_id')
            //     ->references('id')
            //     ->on('sports')
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unique([
                // 'sport_id',
                'user_id',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sport_user');
    }
}
