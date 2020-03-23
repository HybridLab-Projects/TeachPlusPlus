<?php
use Teachplusplus\Teachers\Models\Teacher;

Route::get('api/teacher', function () {

    $teachers = Teacher::with('subjects', 'feedbacks')->get();
    

    return $teachers;
});

Route::get('api/teacher/{id}', function ($id) {

    $teacher = Teacher::with('subjects', 'feedbacks')->findOrFail($id);
    
   

    return $teacher;
});
