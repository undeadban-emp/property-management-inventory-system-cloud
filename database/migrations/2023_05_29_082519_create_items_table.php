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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('main_item_no', 50)->nullable();
            $table->string('item_no', 50)->nullable();
            $table->text('description');
            $table->string('unit')->nullable();
            $table->string('model_no')->nullable();
            $table->string('serial_no')->nullable();
            $table->string('brand')->nullable();
            $table->string('type')->nullable();
            $table->date('acquisition_date')->nullable();
            $table->decimal('acquisition_cost')->nullable();
            $table->decimal('market_appraisal')->nullable();
            $table->date('appraisal_date')->nullable();
            $table->string('remarks')->nullable();
            $table->foreignId('class_id')->nullable();
            $table->string('nature_occupancy')->nullable();
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
        Schema::dropIfExists('items');
    }
};
