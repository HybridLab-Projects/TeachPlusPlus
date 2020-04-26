<?php namespace Teachplusplus\Teachers\Models;

use Model;

/**
 * Model
 */
class Feedback extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     *
     *
     */
    protected $fillable = [
        'feedback',
        'user_id'
    ];

    public $table = 'teachplusplus_teachers_feedbacks';

    public $belongsTo = [
        'teacher' => 'Teachplusplus\Teachers\Models\Teacher',
        'author' => 'RainLab\User\Models\User',
        'subject' => 'Teachplusplus\Teachers\Models\Subject'
    ];

    public $hasMany = [
        'likes' => 'Teachplusplus\Teachers\Models\Like',
        'reports' => 'Teachplusplus\Teachers\Models\Report'
    ];


    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
