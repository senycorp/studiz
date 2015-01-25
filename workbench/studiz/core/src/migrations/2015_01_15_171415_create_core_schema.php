<?php

use Illuminate\Database\Migrations\Migration;

class CreateCoreSchema extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semesters', function ($table)
        {
            $table->increments('id');
            $table->string('title');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->date('start_at');
            $table->date('end_at');

            $table->timestamps();
        });

        Schema::create('subjects', function ($table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('color');
            $table->text('description');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('semester_subject', function ($table)
        {
            $table->increments('id');

            $table->integer('semester_id')->unsigned();
            $table->foreign('semester_id')->references('id')->on('semesters')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subjects')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('timetables', function ($table)
        {
            $table->increments('id');

            $table->integer('semester_subject_id')->unsigned();
            $table->foreign('semester_subject_id')
                ->references('id')
                ->on('semester_subject')->onUpdate('cascade')->onDelete('cascade');

            $table->dateTime('start_at');
            $table->dateTime('end_at');

            $table->timestamps();
        });

        Schema::table('users', function($table) {
             $table->string('picture');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Schema::dropIfExists('timetables');
        Schema::dropIfExists('semester_subject');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('semesters');

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

}
