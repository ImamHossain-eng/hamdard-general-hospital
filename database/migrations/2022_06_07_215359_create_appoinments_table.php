<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppoinmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appoinments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('doctor_id');
            $table->integer('schedule_id');
            $table->mediumText('prescription')->nullable();
            $table->boolean('check')->default(false);
            $table->boolean('payment')->default(false);
            $table->string('patient_name')->nullable();
            $table->string('patient_age')->nullable();
            $table->string('patient_weight')->nullable();
            $table->boolean('test')->default(false);
            $table->softDeletes();
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
        Schema::dropIfExists('appoinments');
    }
}
