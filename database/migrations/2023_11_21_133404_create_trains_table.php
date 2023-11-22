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
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string("reference", 100);
            $table->string("slug", 100);
            $table->string("company", 100);
            $table->string("type", 50);
            $table->string("departure_station", 150);
            $table->string("arrival_station", 150);
            $table->time("departure_time");
            $table->time("arrival_time");
            $table->char("code", 5);
            $table->tinyInteger("carriages");
            $table->char("in_time", 1);
            $table->char("is_cancelled", 1);
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
        Schema::dropIfExists('trains');
    }
};
