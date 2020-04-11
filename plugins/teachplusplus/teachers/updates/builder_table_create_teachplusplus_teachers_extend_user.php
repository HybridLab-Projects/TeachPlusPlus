<?php namespace Teachplusplus\Teachers\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTeachplusplusTeachersExtendUser extends Migration
{
    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->boolean('agree')->default(false);
        });
    }
    
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('agree');
        });
    }
}
