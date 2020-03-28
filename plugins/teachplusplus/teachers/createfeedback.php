<?php
use Teachplusplus\Teachers\Models\Feedback;



$data = request()->only([
    'name',
    'content'
]);
Feedback::create($data);