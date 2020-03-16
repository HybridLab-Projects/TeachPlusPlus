<?php

use Teachplusplus\Teachers\Models\Teacher;

/*Route::get('/api/teacher/{id}', function ($id) {
    
    $teacher = Teacher::find($id);
    
    return $teacher;
});

use Teachplusplus\Teachers\Models\Subject;

Route::get('api/subject/{id}', function ($id) {

    $subject = Subject::find($id);
    return $subject;
});
*/
Route::get('api/teachers', function(){

    $teachers = Teacher::with('subject')-get();

    return $teachers;
});

Route::get('api/teacher/{id}',function($id){

    $teacher = Teacher::with('subject')->findOrFail($id);
return $teacher;
});
