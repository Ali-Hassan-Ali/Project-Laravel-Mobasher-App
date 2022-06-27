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
            $table->string('location_floor')->default(0);

            $table->boolean('status')->default(true);

            $table->text('description');

            $table->integer('number_rooms')->default(0);
            $table->integer('price')->default(0);
            $table->integer('views')->default(0);
            $table->integer('region_id');

            $table->foreignIdFor(\App\Models\User::class);
            $table->foreignIdFor(\App\Models\Owner::class);
            $table->foreignIdFor(\App\Models\City::class);
            $table->foreignIdFor(\App\Models\Category::class);
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
