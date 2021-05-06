<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCelebratersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('celebraters', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->string('gender')->nullable();
            $table->string('relationship')->nullable();
            $table->string('postal_code1')->nullable();
            $table->string('postal_code2')->nullable();
            $table->string('address')->nullable();
            $table->string('tel')->nullable();
            $table->string('email')->nullable();
            $table->string('memo')->nullable();
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
        Schema::dropIfExists('celebraters');
    }
}
