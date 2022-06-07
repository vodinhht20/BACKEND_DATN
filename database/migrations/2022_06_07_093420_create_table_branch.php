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
        Schema::create('table_branch', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code_branch');
            $table->string('address');
            $table->string('hotline');
            $table->string('latitude');
            $table->string('longtitude');
            $table->string('radius');
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
        Schema::dropIfExists('table_branch');
    }
};
