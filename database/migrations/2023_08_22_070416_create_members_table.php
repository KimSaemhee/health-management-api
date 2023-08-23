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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('트레이너 id');
            $table->string('name', 100);
            $table->string('email')->unique();
            $table->string('phone', 50)->nullable()->comment('연락처');
            $table->string('address')->nullable()->comment('주소');
            $table->tinyInteger('gender')->nullable()->comment('성별 0:남, 1:여');
            $table->integer('age')->nullable()->comment('나이');
            $table->tinyInteger('status')->default(0)->comment('헬스장 승인 0:대기, 1:승인');
            $table->tinyInteger('health_status')->default(0)->comment('헬스 경험 0:무, 1:유');
            $table->string('place_payment', 100)->nullable()->comment('결제지점');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
