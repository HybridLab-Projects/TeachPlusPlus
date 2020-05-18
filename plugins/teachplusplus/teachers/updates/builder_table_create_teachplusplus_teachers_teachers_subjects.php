<?php namespace Teachplusplus\Teachers\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTeachplusplusTeachersTeachersSubjects extends Migration
{
    public function up()
    {
        Schema::create('teachplusplus_teachers_teachers_subjects', function ($table) {
            $table->engine = 'InnoDB';
            $table->integer('teacher_id');
            $table->integer('subject_id');
            $table->primary(['teacher_id','subject_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('teachplusplus_teachers_teachers_subjects');
    }
}
