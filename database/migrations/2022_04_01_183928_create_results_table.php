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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            // $table->string('comment');
            // $table->string('author');
            // $table->timestamps();
            // $table->id();
            $table->string('comment_id');
            $table->string('comment_name');
            $table->string('forename');
            $table->string('surname');
            $table->string('email');
            $table->integer('validated')->default(0);
            $table->string('style')->default('n');
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
        Schema::dropIfExists('results');
    }
};
