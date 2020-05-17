<?php namespace Teachplusplus\Teachers\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTeachplusplusTeachersReports extends Migration
{
    public function up()
    {
        Schema::create('teachplusplus_teachers_reports', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('feedback_id')->nullable();
            $table->integer('user_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('teachplusplus_teachers_reports');
    }
}
