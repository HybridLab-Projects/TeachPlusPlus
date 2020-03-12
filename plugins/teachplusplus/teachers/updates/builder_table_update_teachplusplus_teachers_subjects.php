<?php namespace Teachplusplus\Teachers\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTeachplusplusTeachersSubjects extends Migration
{
    public function up()
    {
        Schema::table('teachplusplus_teachers_subjects', function($table)
        {
            $table->renameColumn('name', 'subject_name');
        });
    }
    
    public function down()
    {
        Schema::table('teachplusplus_teachers_subjects', function($table)
        {
            $table->renameColumn('subject_name', 'name');
        });
    }
}
