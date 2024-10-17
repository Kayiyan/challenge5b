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
            // Add the username field
            $table->string('username')->unique()->after('id');

            // Add the role field with default value 'student'
            $table->enum('role', ['teacher', 'student'])->default('student')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the fields if rolling back the migration
            $table->dropColumn('username');
            $table->dropColumn('role');
        });
    }
};
