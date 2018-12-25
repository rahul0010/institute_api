<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('course_id')->nullable();
            $table->integer('installment_no');
            $table->integer('installment_amount');
            $table->integer('total_fees');
            $table->integer('fees_paid')->nullable();
            $table->date('payment_due')->nullable();
            $table->integer('amount')->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->integer('total_fee_paid')->nullable();
            $table->integer('balance')->nullable();
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
        Schema::dropIfExists('fees');
    }
}
