<?php namespace Teachplusplus\Teachers\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTeachplusplusTeachersFeedbacks extends Migration
{
    public function up()
    {
        Schema::table('teachplusplus_teachers_feedbacks', function($table)
        {
            $table->integer('user_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('teachplusplus_teachers_feedbacks', function($table)
        {
            $table->dropColumn('user_id');
        });
    }
}
