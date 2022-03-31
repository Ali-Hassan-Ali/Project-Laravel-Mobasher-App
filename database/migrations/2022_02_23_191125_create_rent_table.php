<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\apartment;

class CreateRentTable extends Migration
{
    /**
     * Run the migrations.
     *  heroku config:set APP_KEY=…
     * https://nameless-garden-84689.herokuapp.com/
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(apartment::class);
            $table->integer('status')->default('0');
            $table->boolean('Rented')->default(false);
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
        Schema::dropIfExists('rent');
    }
}
