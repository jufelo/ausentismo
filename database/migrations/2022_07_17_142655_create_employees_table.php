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
            $table->string('name','70');
            $table->string('lastname','70');
            $table->string('ti','20');
            $table->string('identification','20')->unique();
            $table->string('salary','20');
            $table->string('position','20');
            $table->string('work_area','20');
            $table->string('eps','20');
            $table->string('arl','20');
            $table->string('afp','20');
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
