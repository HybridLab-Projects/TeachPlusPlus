<?php namespace Teachplusplus\Teachers\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTeachplusplusTeachersFeedbacks extends Migration
{
    public function up()
    {
        Schema::rename('teachplusplus_teachers_feedback', 'teachplusplus_teachers_feedbacks');
    }
    
    public function down()
    {
        Schema::rename('teachplusplus_teachers_feedbacks', 'teachplusplus_teachers_feedback');
    }
}
