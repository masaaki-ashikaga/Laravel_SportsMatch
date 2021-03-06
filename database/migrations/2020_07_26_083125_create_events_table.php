<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('comment');
            $table->string('prefecture')->comment('都道府県');
            $table->string('venue')->comment('会場')->nullable();
            $table->string('address')->comment('イベント開催住所');
            $table->date('event_start_date')->comment('イベント開催日');
            $table->time('event_start_time')->comment('イベント開催時刻');
            $table->date('event_end_date')->comment('イベント終了日');
            $table->time('event_end_time')->comment('イベント終了時刻');
            $table->integer('capacity')->comment('定員');
            $table->integer('payment')->comment('料金');
            $table->date('apply_end_date')->comment('受付終了日');
            $table->time('apply_end_time')->comment('受付終了時刻');
            $table->string('event_imagepath')->nullable();
            $table->boolean('public')->comment('公開状況');
            $table->unsignedBigInteger('sport_id');
            $table->unsignedBigInteger('team_id')->nullable();
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
        Schema::dropIfExists('events');
    }
}
