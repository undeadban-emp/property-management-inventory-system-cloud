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
        Schema::create('property_acknowledgment_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pa_id');
            $table->integer('quantity')->nullable();
            $table->string('unit')->nullable();
            $table->integer('item_id')->nullable();
            $table->date('acquisition_date')->nullable();
            $table->decimal('acquisition_cost', 18, 2)->nullable();
            $table->string('property_no')->nullable();
            $table->string('end_user')->nullable();
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
        Schema::dropIfExists('property_acknowledgment_items');
    }
};
