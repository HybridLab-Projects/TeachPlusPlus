<?php namespace Teachplusplus\Teachers\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTeachplusplusTeachersLikes extends Migration
{
    public function up()
    {
        Schema::table('teachplusplus_teachers_likes', function($table)
        {
            $table->integer('user_id')->nullable()->change();
            $table->integer('feedback_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('teachplusplus_teachers_likes', function($table)
        {
            $table->integer('user_id')->nullable(false)->change();
            $table->integer('feedback_id')->nullable(false)->change();
        });
    }
}
