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


    public $hasOne =[
        'subject' => 'Teachplusplus\teachers\Models\Subject'
    ];

    public $belongsTo = [
        'teacher' => 'Teachplusplus\Teachers\Models\Teacher',
        'author' => 'RainLab\User\Models\User'
    ];

    public $hasMany = [
        'likes' => 'Teachplusplus\Teachers\Models\Like',
    ];


    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
