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
        Schema::create('user_tokens', function (Blueprint $table) {
            $table->id();
            // user_idを紐づける
            // cascadeで紐づいたデータが削除・更新したときにこのレコードも同時処理
            $table->foreignId('user_id')->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('api_token', 60)->unique();
            $table->timestamp('created_at')
                ->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_tokens');
    }
};
