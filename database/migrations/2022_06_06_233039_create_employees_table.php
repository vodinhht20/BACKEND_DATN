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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->index();
            $table->string('password');
            $table->string('email')->unique()->index();
            $table->string('avatar')->nullable();
            $table->string('phone')->nullable();
            $table->string('employee_code')->unique()->index();
            $table->string('personal_email')->nullable();
            $table->tinyInteger('gender');
            $table->tinyInteger('status')->default(1);
            $table->bigInteger('position_id')->index();
            $table->bigInteger('branch_id')->index();
            $table->tinyInteger('is_checked')->default(1);
            $table->tinyInteger('type_avatar')->default(1);
            $table->text('note')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('employees');
    }
};
