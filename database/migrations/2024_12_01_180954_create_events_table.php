<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name', 255);
            $table->text('description')->nullable();
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->unsignedBigInteger('event_type_id')->nullable();
            $table->unsignedBigInteger('organizer_id')->nullable();
            $table->string('picture')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('event_type_id')->references('id')->on('event_types');
            $table->foreign('organizer_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
}
