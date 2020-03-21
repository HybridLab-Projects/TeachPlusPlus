<?php namespace Teachplusplus\Teachers\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTeachplusplusTeachers extends Migration
{
    public function up()
    {
        Schema::table('teachplusplus_teachers_', function($table)
        {
            $table->integer('feedback_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('teachplusplus_teachers_', function($table)
        {
            $table->dropColumn('feedback_id');
        });
    }
}
