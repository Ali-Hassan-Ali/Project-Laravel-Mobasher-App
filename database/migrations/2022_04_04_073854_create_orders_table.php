<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            
            $table->foreignIdFor(\App\Models\Apartment::class);
            $table->foreignIdFor(\App\Models\User::class);

            $table->string('full_name');
            $table->integer('age');
            $table->string('gender');
            $table->integer('identity');
            $table->string('social_situation');
            $table->string('works');
            $table->integer('phone1');
            $table->integer('phone2');
            $table->integer('total_price');

            $table->string('city');
            $table->string('region');
            $table->string('full_region')->nullable();

            $table->string('type_of_rent');
            $table->string('incom');
            $table->boolean('agreeya')->default(0);

            $table->enum('status', ['waiting', 'apeoved', 'unapeoved'])->default('waiting');
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
        Schema::dropIfExists('orders');
    }
}
