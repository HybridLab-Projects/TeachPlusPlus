<?php namespace Teachplusplus\Teachers\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTeachplusplusTeachersFeedbacksSubjects extends Migration
{
    public function up()
    {
        Schema::create('teachplusplus_teachers_feedbacks_subjects', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('feedback_id');
            $table->integer('subject_id');
            $table->primary(['feedback_id','subject_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('teachplusplus_teachers_feedbacks_subjects');
    }
}
