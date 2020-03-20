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
     */
    public $table = 'teachplusplus_teachers_feedbacks';

    public $belongsToMany =[
        'teachers' =>[
            'Teachplusplus\teachers\models\Teacher',
            'table' => 'teachplusplus_teachers_feedbacks_teachers',
            'order' => 'name'
        ]
        ];

    public $hasOne =[ 

        'subject' => 'Teachplusplus\teachers\Models\Subject',
        'key' => 'name'
        ];


    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
