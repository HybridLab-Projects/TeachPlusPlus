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
            $table->string('name');
            $table->string('short');

            $table->renameColumn('name', 'subject_name');
            $table->integer('feedback_id')->nullable();
            $table->dropColumn('feedback_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('teachplusplus_teachers_subjects');

        $table->renameColumn('subject_name', 'name');
        $table->dropColumn('feedback_id')->nullable();
    }
}
