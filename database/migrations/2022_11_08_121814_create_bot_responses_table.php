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
        Schema::create('bot_responses', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');

            $table->string('channel');
            $table->uuid('bot_session_id')->index();
            $table->uuid('bot_session_step_id')->index();
            $table->string('key_word');
            $table->string('image_url')->nullable();
            $table->longText('response_text');
            $table->boolean('show_step_id')->default(0);
            $table->string('next_session_step');

            $table->boolean('is_next_step_session')->nullable();
            $table->string('next_session')->nullable();

            $table->foreign('bot_session_id')
                ->references('id')
                ->on('bot_sessions')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('bot_session_step_id')
                ->references('id')
                ->on('bot_session_steps')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('bot_responses');
    }
};
