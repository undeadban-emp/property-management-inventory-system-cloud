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
        Schema::create('inventory_custodian_item_end_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ic_item_id');
            $table->string('property_no')->nullable();
            $table->string('end_user')->nullable();
            $table->tinyInteger('is_returned')->default(0);
            $table->string('serial_no')->nullable();
            $table->string('plate_number')->nullable();
            $table->string('engine_number')->nullable();
            $table->string('chassis_number')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_custodian_item_end_users');
    }
};
