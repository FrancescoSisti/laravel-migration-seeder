<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string("company")->nullable(false);
            $table->string("departure_station")->nullable(false);
            $table->string("arrival_station")->nullable(false);
            $table->date("departure_date")->nullable(false);
            $table->time("departure_time")->nullable(false);
            $table->date("arrival_date")->nullable(false);
            $table->time("arrival_time")->nullable(false);
            $table->string("train_code", 15)->unique()->nullable(false);
            $table->tinyInteger("wagons_no")->unsigned()->nullable(false);
            $table->boolean("on_time")->default(true)->nullable(false);
            $table->boolean("suspended")->default(false)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trains');
    }
};