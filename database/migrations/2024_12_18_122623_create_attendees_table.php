<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendeesTable extends Migration
{
    public function up()
    {
        Schema::create('attendees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('rsvp_status', ['Yes', 'No', 'Maybe', 'Undecided']);
            $table->foreignId('event_id')->constrained()->onDelete('cascade'); // Ensure attendees belong to an event
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendees');
    }
}
