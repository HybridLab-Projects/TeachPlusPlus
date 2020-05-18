<?php namespace Teachplusplus\Teachers\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTeachplusplusTeachersSubjects extends Migration
{
    public function up()
    {
        Schema::create('teachplusplus_teachers_subjects', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('short');
            $table->string('subject_name');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('teachplusplus_teachers_subjects');
    }
}
