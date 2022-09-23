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
            $table->foreignId('user_id');

            $table->string('name');
            $table->integer('phone');

            $table->integer('total_price')->default('0');
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
