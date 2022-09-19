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
        Schema::create('sub_property_types', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('property_type_id')->unsigned();
            $table->foreign('property_type_id')->references('id')->on('property_types')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            //$table->enum('status',['Condo','Apartment','House','Room'])->default('Apartment');
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
        Schema::dropIfExists('sub_property_types');
    }
};
