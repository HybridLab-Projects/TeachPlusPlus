<?php
use Teachplusplus\Teachers\Models\Teacher;

Route::group(['prefix' => 'api'], function () {
Route::get('teacher', function () {

    $teachers = Teacher::with('subjects', 'feedbacks')->get();
    

    return $teachers;
});

Route::get('teacher/{id}', function ($id) {

    $teacher = Teacher::with('subjects', 'feedbacks')->findOrFail($id);
    
   

    return $teacher;
});
});
