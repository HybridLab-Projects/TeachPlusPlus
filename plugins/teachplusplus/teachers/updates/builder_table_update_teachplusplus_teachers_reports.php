<?php namespace Teachplusplus\Teachers\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTeachplusplusTeachersReports extends Migration
{
    public function up()
    {
        Schema::rename('teachplusplus_teachers_report', 'teachplusplus_teachers_reports');
    }
    
    public function down()
    {
        Schema::rename('teachplusplus_teachers_reports', 'teachplusplus_teachers_report');
    }
}
