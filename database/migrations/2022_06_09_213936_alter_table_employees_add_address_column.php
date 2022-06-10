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
        Schema::table('employees', function (Blueprint $table) {
            $table->string('address')->nullable();
            $table->string('email_verified_at')->nullable();
            $table->string('email_confirm_token')->nullable();
            $table->string('email_confirm_token_expired_at')->nullable();
            $table->date('birth_day')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('address')->nullable();
            $table->dropColumn('email_verified_at')->nullable();
            $table->dropColumn('email_confirm_token')->nullable();
            $table->dropColumn('email_confirm_token_expired_at')->nullable();
            $table->dropColumn('birth_day')->nullable();
        });
    }
};
