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
    Schema::create('posts', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id');
      $table->string('title');
      $table->text('description');
      #images
      #maby an execution time isn't always necessary in case of offering a service
      #as it can vary from case to case
      #$table->timestamp('duration')->nullable();
      $table->integer('postable_id');
      $table->string('postable_type');
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
    Schema::dropIfExists('posts');
  }
};
