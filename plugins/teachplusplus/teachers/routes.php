<?php

use Teachplusplus\Teachers\Controllers\Teachers;
use Teachplusplus\Teachers\Models\Teacher;

Route::get('api/teacher', function () {
    $teachers = Teacher::all();
     $arr=array();

    foreach ($teachers as $teacher) {
        $arr[] = array(
            'id' => $teacher['id'],
            'name' => $teacher['name'],
            'surname' => $teacher['surname'],
            'subject' => $teacher->subject
        );
    }
    return $arr;
});