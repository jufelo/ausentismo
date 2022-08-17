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
        Schema::create('incapacities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('incapacity_type_id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('cie_10_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('clasification');
            $table->decimal('paid_company',14,2)->default(0.00);
            $table->decimal('paid_eps',14,2)->default(0.00);
            $table->decimal('paid_arl',14,2)->default(0.00);
            $table->decimal('paid_afp',14,2)->default(0.00);
            
            $table->foreign('cie_10_id')->references('id')->on('cie_10s')->onDelete('cascade');
            $table->foreign('incapacity_type_id')->references('id')->on('incapacity_types')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
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
        Schema::dropIfExists('incapacities');
    }
};
