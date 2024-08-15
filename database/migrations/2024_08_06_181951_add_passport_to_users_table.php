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
            $table->string('passport_number')->nullable()->default(null)->after('address');
            $table->string('passport_series')->nullable()->default(null)->after('address');
            $table->date('passport_date')->nullable()->default(null)->after('address');
            $table->text('passport_address')->nullable()->default(null)->after('address');
            $table->boolean('passport_check')->default(0)->after('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('passport_number');
            $table->dropColumn('passport_series');
            $table->dropColumn('passport_date');
            $table->dropColumn('passport_address');
            $table->dropColumn('passport_check');
        });
    }
};
