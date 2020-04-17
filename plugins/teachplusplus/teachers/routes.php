<?php

use RainLab\User\Models\User;
use Teachplusplus\Teachers\Models\Feedback;
use Teachplusplus\Teachers\Models\Like;
use Teachplusplus\Teachers\Models\Subject;
use Teachplusplus\Teachers\Models\Teacher;

Route::group(['prefix' => 'api'], function () {
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
        $authorId = request()->input('user_id');
        

        $teacher = Teacher::find($teacherId);
        $subject = Subject::find($subjectId);
        $author = User::find($authorId);

        $feedback = Feedback::create($feedbackData);
        $feedback->teacher()->associate($teacher);
        $feedback->subject()->associate($subject);
        $feedback->author()->associate($author);
        $feedback->save();
        
        return $feedback;
    });
  
    Route::post('like', function () {
        $feedbackId = request()->input('feedback_id');
        $userId = request()->input('user_id');

        $feedback = Feedback::find($feedbackId);
        $user = User::find($userId);

        if (Like::where(['feedback_id' => $feedbackId, 'user_id' => $userId])->exists()) {
            $like = Like::where(['feedback_id' => $feedbackId, 'user_id' => $userId])->first();
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
