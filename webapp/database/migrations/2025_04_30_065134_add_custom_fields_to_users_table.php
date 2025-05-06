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
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_id')->unique()->after('id');
            $table->string('nickname')->after('user_id');
            $table->string('icon')->nullable()->after('password');
            $table->text('bio')->nullable()->after('icon');
            $table->boolean('is_admin')->default(false)->after('bio');

            // メールアドレスをnullableに変更（必要なら）
            $table->string('email')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
