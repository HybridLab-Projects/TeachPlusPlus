<?php namespace Teachplusplus\Teachers;

use RainLab\User\Models\User;
use System\Classes\PluginBase;
use RainLab\User\Controllers\Users as UsersController;
use Teachplusplus\Teachers\Models\Feedback;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }
    public function boot()
    {
        User::extend(function ($model) {
            $model->hasMany['likes'] = ['Teachplusplus\Teachers\Models\Like'];
            $model->hasMany['feedbacks'] = ['Teachplusplus\teachers\Models\Feedback'];
            $model->addFillable(['agree']);
            $model->bindEvent('model.beforeValidate', function () use ($model) {
                $model->rules['agree'] = 'required|accepted';
            });
        });


        UsersController::extendFormFields(function($form, $model, $context){

            $form->addFields([

                'agree' => [
                    'label' => 'Agree',
                    'type' => 'checkbox',
                    'default' => false
                
                ],

            ]);

        });
    
    }
}
