<?php namespace Teachplusplus\Teachers\Models;

use Model;

/**
 * Model
 */
class Teacher extends Model
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
    public $table = 'teachplusplus_teachers_';

    public $belongsToMany =[

        'subject' =>[
            'Teachplusplus\teachers\models\Subject',
            'table' => 'teachplusplus_teachers_teachers_subjects',
            'order' => 'subject_name'

        ]
        ];

       


    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
