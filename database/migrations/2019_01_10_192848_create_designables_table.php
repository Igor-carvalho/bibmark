<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designables', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('design_id');
            $table->unsignedInteger('designable_id');
            $table->string('deesignable_type');
            $table->unsignedInteger('account_id')->nullable();
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
        Schema::dropIfExists('designables');
    }
}
