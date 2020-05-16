<?php namespace Teachplusplus\Teachers\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTeachplusplusTeachers extends Migration
{
    public function up()
    {
        Schema::create('teachplusplus_teachers_', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('surname');
            $table->integer('feedback_id')->nullable();
            $table->dropColumn('feedback_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('teachplusplus_teachers_');
        $table->dropColumn('feedback_id');
        $table->integer('feedback_id')->nullable();
    }
}
