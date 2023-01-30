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
            $table->unsignedBigInteger("reservation_id")->nullable($value = true);
            $table->foreign("reservation_id")->references("id")->on("reservations");
        });

        Schema::table("reservations", function (Blueprint $table) {
            $table->foreignId("place_id")->nullable()->constrained("places");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("reservations", function (Blueprint $table) {
            $table->dropForeign("reservations_place_id_foreign");
        });

        Schema::table("users", function (Blueprint $table) {
            $table->dropForeign("users_reservation_id_foreign");
        });
    }
};
