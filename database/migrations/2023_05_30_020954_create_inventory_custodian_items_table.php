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
        Schema::create('inventory_custodian_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ic_id');
            $table->integer('item_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('unit')->nullable();
            $table->decimal('unit_cost', 18, 2)->nullable();
            $table->decimal('unit_total_cost', 18, 2)->nullable();
            $table->string('inventory_item_no')->nullable();
            $table->string('est_useful_life')->nullable();
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
        Schema::dropIfExists('inventory_custodian_items');
    }
};
