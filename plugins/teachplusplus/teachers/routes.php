<?php
use Teachplusplus\Teachers\Models\Teacher;
use Teachplusplus\Teachers\Models\Feedback;
use Teachplusplus\Teachers\Models\Subject;

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
    $feedback = Feedback::create($data);
    
    $teacher = Teacher::find(2);

    $feedback->teacher()->associate($teacher);

    $feedback->save();

    });
});