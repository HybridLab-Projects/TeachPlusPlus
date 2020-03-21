<?php namespace Teachplusplus\Teachers\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTeachplusplusTeachersFeedbacksTeachers extends Migration
{
    public function up()
    {
        Schema::create('teachplusplus_teachers_feedbacks_teachers', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('feedback_id');
            $table->integer('teacher_id');
            $table->primary(['feedback_id','teacher_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('teachplusplus_teachers_feedbacks_teachers');
    }
}
