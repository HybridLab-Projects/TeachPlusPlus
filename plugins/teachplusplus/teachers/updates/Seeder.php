<?php namespace Teachplusplus\Teachers\Updates;

use Seeder;
use RainLab\User\Models\User;
use Teachplusplus\Teachers\Models\Feedback;
use Teachplusplus\Teachers\Models\Subject;
use Teachplusplus\Teachers\Models\Teacher;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user1 = User::create([
            'name' => 'user',
            'surname' => 'jeden',
            'username' => 'userJeden',
            'email' => 'user@user.sk',
            'password' => 'Password1234',
            'password_confirmation' => 'Password1234',
            'agree' => true,
            'is_activated' => true
        ]);
        $user2 = User::create([
            'name' => 'user',
            'surname' => 'dva',
            'username' => 'userDva',
            'email' => 'user2@user.sk',
            'password' => 'Password1234',
            'password_confirmation' => 'Password1234',
            'agree' => true,
            'is_activated' => true
        ]);

        $subjectNEM = Subject::create([
            'subject_name' => 'Nemecký jazyk',
            'short' => 'NEM'
        ]);

        $subjectANJ = Subject::create([
            'subject_name' => 'Anglický jazyk',
            'short' => 'ANJ'
        ]);


        $teacher1 = Teacher::create([
            'name' => 'Emília',
            'surname' => 'Jančuškova',
            
        ]);

        $teacher2 = Teacher::create([
            'name' => 'Gabriela',
            'surname' => 'Zvadová',
            
        ]);

        $feedback1 = Feedback::create([
            'feedback' => 'Super hodina',
        ]);

        
        
        $feedback2 = Feedback::create([
            'feedback' => 'Mila pani ucitelka',
        ]);

        $teacher1->subjects()->attach($subjectNEM);
        $teacher2->subjects()->attach($subjectANJ);
        $teacher1->save();
        $teacher2->save();

        $feedback1->teacher = $teacher1;
        $feedback1->author = $user1;
        $feedback1->subject = $subjectNEM;
        $feedback1->save();

        $feedback2->teacher = $teacher2;
        $feedback2->author = $user2;
        $feedback2->subject = $subjectANJ;
        $feedback2->save();
    }
}
