<?php namespace Teachplusplus\Teachers\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTeachplusplusTeachersFeedbacks extends Migration
{
    public function up()
    {
        Schema::create('teachplusplus_teachers_feedbacks', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('feedback')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->integer('author_id')->nullable();
            $table->integer('subject_id')->nullable();
            $table->boolean('banned')->default(false);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('teachplusplus_teachers_feedbacks');
    }
}
