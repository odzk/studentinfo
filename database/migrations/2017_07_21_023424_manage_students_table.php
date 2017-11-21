<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ManageStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_name', 255)->nullable();
            $table->string('student_nick', 255)->nullable();
            $table->string('skype_id', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('batch_num', 255)->nullable();
            $table->string('student_id', 255)->nullable();
            $table->string('gender', 255)->nullable();
            $table->string('birth_place', 255)->nullable();
            $table->date('birth_date', 255)->nullable();
            $table->integer('age')->nullable();
            $table->string('it_level', 255)->nullable();
            $table->string('esl_level', 255)->nullable();
            $table->string('course_category', 255)->nullable();
            $table->integer('duration')->nullable();
            $table->date('date_started', 255)->nullable();
            $table->date('date_completed', 255)->nullable();
            $table->string('other_info', 500)->nullable();
            $table->string('portfolio_1', 255)->nullable();
            $table->string('portfolio_2', 255)->nullable();
            $table->string('portfolio_3', 255)->nullable();
            $table->string('student_photo', 255)->nullable();
            $table->string('old_student_photo', 255)->nullable();
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
        Schema::drop('manage_students');

    }
}
