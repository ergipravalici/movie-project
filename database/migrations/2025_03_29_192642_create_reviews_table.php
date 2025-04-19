<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration {
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('movie_id')->constrained('movies');
            $table->text('comment');
            $table->string('status');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}