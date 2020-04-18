<?php namespace Teachplusplus\Teachers\Updates;

use Seeder;
use Teachplusplus\Teachers\Models\Teacher;
use Teachplusplus\Teachers\Models\Subject;
use Teachplusplus\Teachers\Models\Feedback;
use RainLab\User\Models\User;

class TeacherSeeder extends Seeder
{
    public function run()
    {
        $subject = Subject::create([
            'subject_name' => 'Nemecký jazyk',
            'short' => 'NEM'
        ]);

        $subject = Subject::create([
            'subject_name' => 'Anglický jazyk',
            'short' => 'ANJ'
        ]);


        $teacher = Teacher::create([
            'name' => 'Emília',
            'surname' => 'Jančuškova',
            
        ]);

        $teacher = Teacher::create([
            'name' => 'Gabriela',
            'surname' => 'Zvadová',
            
        ]);

        $feedback = Feedback::create([
            'feedback' => 'Super hodina', 
        ]);
        
        $feedback = Feedback::create([
            'feedback' => 'Mila pani ucitelka',
        ]);
    }

}