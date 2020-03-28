<?php
use Teachplusplus\Teachers\Models\Teacher;
use Teachplusplus\Teachers\Models\Feedback;

Route::group(['prefix' => 'api'], function () {
Route::get('teacher', function () {

    $teachers = Teacher::with('subjects', 'feedbacks')->get();
    

    return $teachers;
});

Route::get('teacher/{id}', function ($id) {

    $teacher = Teacher::with('subjects', 'feedbacks')->findOrFail($id);
    
   

    return $teacher;
});

Route::post('feedback', function () {


    $data = request()->only([
        'content'
    ]);
    Feedback::create($data);
    });

});
