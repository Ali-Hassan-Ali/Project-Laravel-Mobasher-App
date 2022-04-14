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
            $table->string('region')->default('region');
            $table->string('generator')->default('0');
            $table->string('kitchen')->default('0');
            $table->string('fans')->default('0');
            $table->string('conditioner')->default('0');
            $table->string('type');
            $table->string('image')->default('apartment_images/default.png');
            $table->string('floor')->default(0);
            $table->string('city');
            $table->string('state');
            $table->string('dimensions');
            $table->integer('small_room')->default(true);
            $table->integer('medium_room')->default(true);
            $table->integer('large_room')->default(true);
            $table->integer('extra_large_room')->default(true);
            $table->string('street')->default('street');
            $table->longText('description');
            $table->integer('price');
            $table->string('lat')->default(15.399073);
            $table->string('lng')->default(32.928336);
            $table->boolean('avilibalty')->default(1);
            $table->dateTime('available_at')->default(now());
            $table->integer('class')->default(1);
            $table->integer('views')->default(0);
            $table->string('status')->default('waiting');
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
