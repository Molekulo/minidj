<?php

namespace App\Helper;

use App\Model\Users;

/**
 * Class Sessions
 * @package App\Helper
 */
class Sessions
{
    /**
     * @param Users $user
     *
     * @return void
     */
    public static function set(Users $user)
    {
        $_SESSION["role_id"] = $user->role_id;
        $_SESSION["user"]    = $user->username;
        $_SESSION["user_id"] = $user->id;
    }
}