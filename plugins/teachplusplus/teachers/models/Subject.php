<?php namespace Teachplusplus\Teachers\Models;

use Model;

/**
 * Model
 */
class Subject extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'teachplusplus_teachers_subjects';

    public $belongsToMany =[
        'teacher' =>[
            'Teachplusplus\Teachers\Models\Teacher',
            'table' => 'teachplusplus_teachers_teachers_teachers',
            'order' => 'name'
        ]
    ];

    public $belongsTo = [
        'feedback' => 'Teachplusplus\Teachers\Models\Feedback'
    ];

   
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
