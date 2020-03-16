<?php
use Teachplusplus\Teachers\Models\Teacher;

Route::get('api/teacher', function(){

    $teachers = Teacher::with('subject')->get();

    return $teachers;
});

Route::get('api/teacher/{id}',function($id){

    $teacher = Teacher::with('subject')->findOrFail($id);
return $teacher;
});
