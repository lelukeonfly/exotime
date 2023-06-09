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
        Schema::create('demands', function (Blueprint $table) {
            $table->id();
            /* # for now only start and endtime -> later add multiple weekdays with each having start / stop time ... */
            /* $table->string('location'); */
            /* $table->integer('duration_min'); */
            /* $table->timestamp('starting_at')->nullable(); */
            /* $table->timestamp('ending_at')->nullable(); */
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
        Schema::dropIfExists('demands');
    }
};
