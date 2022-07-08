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
        Schema::table('timekeeps', function (Blueprint $table) {
            $table->tinyInteger('type')->default(1);
            $table->float('worktime', 8, 1)->default(0);
            $table->float("minute_late", 8, 1)->default(0);
            $table->float("minute_early", 8, 1)->default(0);
            $table->float("overtime_hour", 8, 1)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('timekeeps', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('worktime');
            $table->dropColumn('minute_late');
            $table->dropColumn('minute_early');
            $table->dropColumn('overtime_hour');
        });
    }
};
