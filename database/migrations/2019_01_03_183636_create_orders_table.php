<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('order_number')->nullable();
            $table->double('amount_charged', 11, 2)->nullable();
            $table->double('discount', 11, 2)->nullable();
            $table->unsignedInteger('coupon_id')->nullable();
            $table->unsignedInteger('charge_id')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->unsignedInteger('source_id')->nullable();
            $table->unsignedInteger('destination_id')->nullable();
            $table->double('weight', 11, 2)->nullable();
            $table->string('parcel_id')->nullable();
            $table->string('easypost_shipment_id')->nullable();
            $table->string('shipping_label')->nullable();
            $table->string('tracking_id')->nullable();
            $table->string('easypost_tracker')->nullable();
            $table->string('shipping_cost')->nullable();
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
