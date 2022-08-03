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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->string('link')->nullable();
            $table->bigInteger('employee_id');
            $table->tinyInteger('domain')->comment('Loại thông báo bên quản trị hay nhân viên');
            $table->tinyInteger('type')->comment('Loại thông báo cho cá nhân hay thông báo tổng');
            $table->tinyInteger('watched')->default(0);
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
        Schema::dropIfExists('notifications');
    }
};
