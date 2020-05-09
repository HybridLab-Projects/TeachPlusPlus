<?php

use Teachplusplus\Teachers\Models\Feedback;
use Teachplusplus\Teachers\Models\Like;
use Teachplusplus\Teachers\Models\Subject;
use Teachplusplus\Teachers\Models\Teacher;
use Tymon\JWTAuth\Facades\JWTAuth;
use Teachplusplus\Teachers\Models\Report;

Route::group(['prefix' => 'api', 'middleware' => '\Tymon\JWTAuth\Middleware\GetUserFromToken'], function () {
    Route::get('teacher', function () {
        $teachers = Teacher::with(['subjects', 'feedbacks.likes.user', 'feedbacks.author', 'feedbacks.subject', 'feedbacks.subject', 'feedbacks.reports', 'feedbacks' => function ($query) {
            $query->where('banned', false);
        }])->get();
        

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

    Route::post(
        'report',
        function () {
            $feedbackId = request()->input('feedback_id');
            $token = request()->input('token');
        

            $feedback = Feedback::find($feedbackId);
            $user = JWTAuth::toUser($token);

            if (Report::where(['feedback_id' => $feedback->id, 'user_id' => $user->id])->exists()) {
                return 'Cannot report the same feedback multiple times.';
            }

            $report = Report::create();
            $report->feedback()->associate($feedback);
            $report->user()->associate($user);
            $report->save();

            if ($feedback->reports()->count() == 3) {
                $feedback->banned = true;
                $feedback->save();
            }
            return $feedback;
        }
    );
});
