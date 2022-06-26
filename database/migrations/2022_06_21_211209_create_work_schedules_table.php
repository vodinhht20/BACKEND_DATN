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
        Schema::create('work_schedules', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('subject_type')->default(1);
            $table->bigInteger('department_id')->nullable();
            $table->bigInteger('position_id')->nullable();
            $table->bigInteger('employee_id')->nullable();
            $table->date('allow_from');
            $table->date('allow_to');
            $table->json('days');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_schedules');
    }
};
