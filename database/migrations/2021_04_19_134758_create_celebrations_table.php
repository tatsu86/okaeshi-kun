<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCelebrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('celebrations', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id');
            $table->integer('celebrater_id');
            $table->boolean('is_return');
            $table->string('return_detail');
            $table->integer('money');
            $table->string('other_gift');
            $table->string('memo');
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
        Schema::dropIfExists('celebrations');
    }
}
