<?php namespace Teachplusplus\Teachers;

use RainLab\User\Models\User;
use System\Classes\PluginBase;

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
            $model->hasMany['like'] = ['Teachplusplus\Teachers\Models\Like'];
        }); 
    }
}
