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
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('celebrater_id');
            $table->integer('money')->nullable();
            $table->string('memo')->nullable();
            $table->boolean('is_return')->default(false);
            $table->string('return_detail')->nullable();
            $table->timestamps();

            $table->foreign('event_id')
                ->references('id')
                ->on('events')
                ->onDelete('cascade');
            $table->foreign('celebrater_id')
                ->references('id')
                ->on('celebraters')
                ->onDelete('cascade');

            $table->unique(['event_id', 'celebrater_id']);
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
