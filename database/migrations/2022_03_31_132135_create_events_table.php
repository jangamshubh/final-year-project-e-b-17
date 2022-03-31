<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('description')->nullable();
            $table->text('type')->nullable();
            $table->text('date')->nullable();
            $table->text('no_of_people_expected')->nullable();
            $table->text('start_time')->nullable();
            $table->text('end_time')->nullable();
            $table->foreignId('committee_id')->constrained('committees');
            $table->foreignId('event_location_id')->constrained('event_locations');
            $table->foreignId('added_by')->constrained('users');
            $table->integer('is_approved')->default(0);
            $table->integer('registration_approval_needed')->default(0);
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
        Schema::dropIfExists('events');
    }
}
