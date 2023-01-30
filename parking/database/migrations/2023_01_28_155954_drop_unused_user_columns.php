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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['name', 'email', 'email_verified_at']);
            $table->boolean('est_actif')->default(false)->nullable($value = true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['est_actif']);
            $table->timestamp('email_verified_at')->nullable($value = true)->default(null);
            $table->string('email', 255)->default(null);
            $table->string('name', 255)->default(null);
        });
    }
};
