<?php namespace Teachplusplus\Teachers\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTeachplusplusTeachersFeedbacks4 extends Migration
{
    public function up()
    {
        Schema::table('teachplusplus_teachers_feedbacks', function($table)
        {
            $table->renameColumn('like', 'likes');
        });
    }
    
    public function down()
    {
        Schema::table('teachplusplus_teachers_feedbacks', function($table)
        {
            $table->renameColumn('likes', 'like');
        });
    }
}
