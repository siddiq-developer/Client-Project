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
        // Schema::create('blogs', function (Blueprint $table) {
        //     $table->id();
        //     $table->text('title');
        //      $table->text('slug');
        //     $table->text('content');
        //     $table->text('image');
        //     $table->string('author');
        //     $table->timestamp('published_at')->nullable();
        //     $table->timestamps();
        // });
// ============================================

        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->text('title');
             $table->text('slug');
            $table->text('content');
            $table->text('image');
            $table->string('author');
            $table->timestamp('published_at')->nullable();
            $table->string('type')->nullable();
            $table->date('date')->default(now());
            $table->timestamps();
        });
    }
// ====================================


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};
