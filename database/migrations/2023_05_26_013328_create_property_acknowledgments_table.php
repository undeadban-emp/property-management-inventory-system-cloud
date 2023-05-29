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
        Schema::create('property_acknowledgments', function (Blueprint $table) {
            $table->id();
            $table->string('office_code')->nullable();
            $table->date('date_acquired')->nullable();
            $table->string('received_from')->nullable();
            $table->string('received_from_pos')->nullable();
            $table->string('received_by')->nullable();
            $table->string('received_by_pos')->nullable();
            $table->date('received_from_date')->nullable();
            $table->date('received_by_date')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('property_acknowledgments');
    }
};
