<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdPlanner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_planner', function (Blueprint $table) {
            $table->foreignId('ad_id')->constrained('ads');
            $table->foreignId('planner_id')->constrained('planners');
            $table->boolean('start')->nullable();
            $table->boolean('end')->nullable();
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
        //
    }
}
