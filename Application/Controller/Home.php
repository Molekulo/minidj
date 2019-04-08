<?php

namespace App\Controller;

use App\Core\Controller;

/**
 * Class Home
 * @package App\Controller
 */
class Home extends Controller
{
    public function index()
    {
        require APP . '/../view/_templates/header.php';
        require APP . '/../view/home/index.php';
        require APP . '/../view/_templates/footer.php';
    }

    public function register()
    {
        require APP . '/../view/_templates/header.php';
        require APP . '/../view/users/register.php';
        require APP . '/../view/_templates/footer.php';
    }

    public function login()
    {
        require APP . '/../view/_templates/header.php';
        require APP . '/../view/users/login.php';
        require APP . '/../view/_templates/footer.php';
    }

    public function logout()
    {
        session_destroy();
        $_SESSION = null;
        $this->index();
    }

    public function addRole()
    {
        if (empty($_SESSION)) {
            $this->index();

            return;
        }
        require APP . '/../view/_templates/header.php';
        require APP . '/../view/admin/addrole.php';
        require APP . '/../view/_templates/footer.php';
    }

    public function editRole()
    {
        if (empty($_SESSION)) {
            $this->index();

            return;
        }
        require APP . '/../view/_templates/header.php';
        require APP . '/../view/admin/edit.php';
        require APP . '/../view/_templates/footer.php';
    }
}
