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
        Schema::table('work_schedules', function (Blueprint $table) {
            $table->time('work_from_at');
            $table->time('work_to_at');
            $table->integer('actual_workday')->default(1);
            $table->integer('check_in_late')->default(0);
            $table->integer('checkout_late')->default(0);
            $table->integer('late_hour')->default(0);
            $table->integer('virtual_workday')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('work_schedules', function (Blueprint $table) {
            $table->dropColumn('work_from_at');
            $table->dropColumn('work_to_at');
            $table->dropColumn('actual_workday');
            $table->dropColumn('checkin_late');
            $table->dropColumn('checkout_late');
            $table->dropColumn('late_hour');
            $table->dropColumn('virtual_workday');
        });
    }
};
