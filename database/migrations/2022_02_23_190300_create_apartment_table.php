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
            $table->string('image')->default('apartment_images/default.png');
            $table->string('floor')->default(0);
            $table->string('city');
            $table->string('state');
            $table->string('dimensions');
            $table->integer('small_room')->nullable();
            $table->integer('medium_room')->nullable();
            $table->integer('large_room')->nullable();
            $table->integer('extra_large_room')->nullable();
            $table->string('street');
            $table->longText('description');
            $table->integer('price');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->boolean('avilibalty')->default(1);
            $table->dateTime('available_at')->nullable();
            $table->integer('class');
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
