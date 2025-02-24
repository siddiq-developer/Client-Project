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
        Schema::create('event_candidates', function (Blueprint $table) {
            $table->id();
            $table->string('token')->nullable();
            $table->integer('member_id');
            $table->integer('event_id');
            $table->string('status');
            $table->integer('result')->nullable();
            $table->integer('total_votes')->default(0);
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
        Schema::dropIfExists('event_candidates');
    }
};
