<?php
use Teachplusplus\Teachers\Models\Teacher;

Route::get('api/teacher', function () {

    $teachers = Teacher::with('subject')->get();

    return $teachers;
})->middleware('\Tymon\JWTAuth\Middleware\GetUserFromToken');

Route::get('api/teacher/{id}', function ($id) {

    $teacher = Teacher::with('subject')->findOrFail($id);
    return $teacher;
})->middleware('\Tymon\JWTAuth\Middleware\GetUserFromToken');
