<?php
namespace App\Statics;

class User
{
    public static $id;
    public static $username;

    public static function setLoginUserData($loginUser)
    {
        self::$id = $loginUser->id;
        self::$username = $loginUser->username;
    }
}