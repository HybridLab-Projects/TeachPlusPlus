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
        'content'
    ];

    public $table = 'teachplusplus_teachers_feedbacks';


    public $hasOne =[ 

        'subject' => 'Teachplusplus\teachers\Models\Subject'
        ];

    public $belongsTo = [
        'teacher' => 'Teachplusplus\Teachers\Models\Teacher',

    ];


    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
