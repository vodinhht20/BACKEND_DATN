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
        Schema::create('confix_company', function (Blueprint $table) {
            $table->id();
            $table->string('name_company');
            $table->string('hotline');
            $table->string('email');
            $table->string('tax_code');
            $table->string('desc');
            $table->string('website');
            $table->string('fanpage');
            $table->string('head_quater');
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
        Schema::dropIfExists('confix_company');
    }
};
