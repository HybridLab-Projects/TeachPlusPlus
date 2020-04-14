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
            $model->hasMany['likes'] = ['Teachplusplus\Teachers\Models\Like'];
            $model->addFillable(['agree']);
            $model->bindEvent('model.beforeValidate', function () use ($model) {
                $model->rules['agree'] = 'required|accepted';
            });
        });
    }
}
