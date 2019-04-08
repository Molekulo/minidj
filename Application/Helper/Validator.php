<?php

namespace App\Helper;

use App\Model\Users;

/**
 * Class Validator
 * @package App\Helper
 */
class Validator
{
    /**
     * @param string $userFromDb
     * @param string $username
     * @param string $emailFromDb
     * @param string $email
     *
     * @return string|bool
     */
    public function isAny($userFromDb, $username, $emailFromDb, $email)
    {
        if ($userFromDb == $username) {
            $status = "Username already exists. Choose different username!";

            return $status;
        }
        if ($emailFromDb == $email) {
            $status = "Email address already exists. Choose different email address!";

            return $status;
        }

        return false;
    }

    /**
     * @param Users $userFromDb
     *
     * @return bool
     */
    public function isAdmin($userFromDb)
    {
        if ($userFromDb->role_id == 1) {
            return true;
        }

        return false;
    }

    /**
     * @param array $post
     *
     * @return string
     */
    public function checkPost(array $post)
    {
        foreach ($post as $key => $value) {
            if (empty($value)) {
                return "Field " . $key . " must not be empty!";
            }
            if (isset($post['password']) && strlen($post['password']) <= 5) {
                return "Short password, must long 6 characters or more";
            }
            if (isset($post['username']) && strlen($post['username']) < 2) {
                return "Username must be at least 2 characters long. Try again!";
            }
            if (!isset($post['email']) &&
                !empty($post['email']) &&
                !filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
                return "Invalid email format";
            }
        }

        return true;
    }
}
