<?php namespace Teachplusplus\Teachers\Models;

use Model;

/**
 * Model
 */
class Report extends Model
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
    public $table = 'teachplusplus_teachers_report';

    public $belongsTo = [
        'feedback' => 'Teachplusplus\teachers\Models\Feedback',
        'user' => 'Rainlab\User\Models\User',
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
