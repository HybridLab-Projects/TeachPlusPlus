<?php

use RainLab\User\Models\User;
use Teachplusplus\Teachers\Models\Feedback;
use Teachplusplus\Teachers\Models\Like;
use Teachplusplus\Teachers\Models\Subject;
use Teachplusplus\Teachers\Models\Teacher;
use Tymon\JWTAuth\Facades\JWTAuth;

Route::group(['prefix' => 'api', 'middleware' => '\Tymon\JWTAuth\Middleware\GetUserFromToken'], function () {
    Route::get('teacher', function () {
        $teachers = Teacher::with('subjects', 'feedbacks.likes', 'feedbacks.author', 'feedbacks.subject')->get();
        
        return $teachers;
    });
    
    Route::get('teacher/{id}', function ($id) {
        $teacher = Teacher::with('subjects', 'feedbacks.likes')->findOrFail($id);
        
        return $teacher;
    });

    Route::post('feedback', function () {
        $feedbackData = request()->only([
            'feedback',
        ]);
        $teacherId = request()->input('teacher_id');
        $subjectId = request()->input('subject_id');
        $token = request()->input('token');
        

        $teacher = Teacher::find($teacherId);
        $subject = Subject::find($subjectId);
        $author = JWTAuth::toUser($token);

        $feedback = Feedback::create($feedbackData);
        $feedback->teacher()->associate($teacher);
        $feedback->subject()->associate($subject);
        $feedback->author()->associate($author);
        $feedback->save();
        
        return $feedback;
    });
  
    Route::post('like', function () {
        $feedbackId = request()->input('feedback_id');
        $token = request()->input('token');
        

        $feedback = Feedback::find($feedbackId);
        $user = JWTAuth::toUser($token);

        if (Like::where(['feedback_id' => $feedback->id, 'user_id' => $user->id])->exists()) {
            $like = Like::where(['feedback_id' => $feedback->id, 'user_id' => $user->id])->first();
            $like->delete();
            $like->save();
        } else {
            $like = Like::create();
            $like->feedback()->associate($feedback);
            $like->user()->associate($user);
            $like->save();
        }
    });
});
