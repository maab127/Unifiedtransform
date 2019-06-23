<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->integer('admission_fee')->default(0);
            $table->integer('reg_fee')->default(0);
            $table->integer('tuition_fee')->default(0);
            $table->integer('workbook_fee')->default(0);
            $table->integer('notebook_fee')->default(0);
            $table->integer('security_fee')->default(0);
            $table->integer('stationary_fee')->default(0);
            $table->integer('paper_fee')->default(0);
            $table->integer('anual_fee')->default(0);
            $table->integer('summer_fee')->default(0);
            $table->date('admission_date');
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
        Schema::dropIfExists('registration_fees');
    }
}
