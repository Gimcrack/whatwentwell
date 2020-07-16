<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prompts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->boolean('enabled')->default(true);
            $table->text('question');
            $table->enum('interval',['DAILY','WEEKLY','MONTHLY','RANDOM']);
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
        Schema::dropIfExists('prompts');
    }
}
