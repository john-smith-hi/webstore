<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->integer('user_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('tel');
            $table->bigInteger('total')->default(0);
            $table->string('status')->default(0);
            $table->string('shipping_address');
            $table->string('shipping_address2')->nullable();
            $table->string('payment_method')->nullable();
            $table->integer('status_payment')->default(0);
            $table->date('order_date');
            $table->date('delivery_date')->nullable();
            $table->date('receive_date')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
