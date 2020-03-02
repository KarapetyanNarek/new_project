<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade');;
            $table->string('email')->unique();
            $table->string('phone');
            $table->timestamp('created_at')->default('CURRENT_TIMESTAMP');
            $table->timestamp('updated_at')->default('CURRENT_TIMESTAMP');
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
}
