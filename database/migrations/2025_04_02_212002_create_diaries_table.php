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
      Schema::create('diaries', function (Blueprint $table) {
        $table->id();
        $table->date('date');
        $table->string('title');
        $table->text('body');
        // $table->dateTime('created_at');
        // $table->dateTime('updated_at');
        // Laravelが自動的に created_at と updated_at を設定
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      // もし 'diaries' というテーブルがすでに存在していたら削除する
      Schema::dropIfExists('diaries');
    }
};
