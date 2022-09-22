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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('property_type')->nullable();
            $table->string('sub_property_type')->nullable();
            $table->string('address')->nullable();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->string('unit')->nullable();
            $table->string('year_build')->nullable();
            $table->string('pet_friendly')->nullable();
            $table->string('furnished')->nullable();
            $table->string('short_term')->nullable();
            $table->string('lease_term')->nullable();
            $table->string('parking_type')->nullable();
            $table->string('parking_spots')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(0);
            $table->boolean('is_updated')->default(0);
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
        Schema::dropIfExists('properties');
    }
};
