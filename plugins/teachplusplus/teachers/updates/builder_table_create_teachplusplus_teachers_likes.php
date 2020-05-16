<?php namespace Teachplusplus\Teachers\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTeachplusplusTeachersLikes extends Migration
{
    public function up()
    {
        Schema::create('teachplusplus_teachers_likes', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('user_id')->nullable()->change();;
            $table->integer('feedback_id')->nullable()->change();;
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('teachplusplus_teachers_likes');
        $table->integer('user_id')->nullable(false)->change();
        $table->integer('feedback_id')->nullable(false)->change();
    }
}
