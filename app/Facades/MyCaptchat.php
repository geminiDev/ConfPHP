<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;
class MyCaptchat extends Facade{
    protected static function getFacadeAccessor(){
        return'MyCaptchat';
    }
}