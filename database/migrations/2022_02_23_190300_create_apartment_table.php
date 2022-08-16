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

            // Building Features
            $table->boolean('corner')->default('0');
            $table->boolean('near_the_road')->default('0');
            $table->boolean('outstanding_teacher')->default('0');

            // Service features

            $table->boolean('schools')->default('0');
            $table->boolean('markets')->default('0');
            $table->boolean('other_services')->default('0');

            // inner shape

            $table->foreignIdFor(\App\Models\Category::class);
            $table->integer('number_rooms')->default(10);
            $table->integer('floor_rooms')->default(10);
            $table->integer('area_metres')->default(250);
            $table->integer('number_bathrooms')->default(250);

            $table->boolean('generator')->default('0');
            $table->boolean('balcony')->default('0');
            $table->boolean('passenger_kitchen')->default('0');
            $table->boolean('elevator')->default('0');

            $table->string('video')->default('apartment_video/default.mp4');
            $table->string('city_id')->nullable();
            $table->string('region_id')->nullable();
            $table->string('number_rental_days')->nullable();
            $table->integer('price_range')->nullable();

            // Apartment owner information
            $table->string('full_name')->nullable();
            $table->integer('first_phone')->nullable();
            $table->integer('second_phone')->nullable();
            $table->string('ownership')->nullable();
            $table->string('full_name_owner')->nullable();
            $table->string('national_card')->nullable();

            $table->integer('rating')->default(3);

            $table->boolean('status')->default('1');
            $table->integer('views')->default(0);

            $table->foreignIdFor(\App\Models\Owner::class)->nullable();
            $table->foreignIdFor(\App\Models\User::class)->nullable();

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
