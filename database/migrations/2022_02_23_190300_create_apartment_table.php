<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->string('floor');
            $table->string('city');
            $table->string('state');
            $table->string('dimensions');
            $table->integer('small_room');
            $table->integer('medium_room');
            $table->integer('large_room');
            $table->integer('extra_large_room');
            $table->string('street');
            $table->longText('Description');
            $table->integer('price');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->boolean('avilibalty')->default(1);
            $table->dateTime('Available_at')->nullable();
            $table->integer('class');
            $table->integer('views')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('apartment');
    }
}
