<?php namespace Teachplusplus\Teachers\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteTeachplusplusTeachersFeedbacksSubjects extends Migration
{
    public function up()
    {
        Schema::dropIfExists('teachplusplus_teachers_feedbacks_subjects');
    }
    
    public function down()
    {
        Schema::create('teachplusplus_teachers_feedbacks_subjects', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('feedback_id');
            $table->integer('subject_id');
            $table->primary(['feedback_id','subject_id']);
        });
    }
}
