<?php

namespace App\Controller;

use App\Core\Controller;
use App\Helper\HtmlRender;
use App\Helper\Validator;
use App\Helper\Sessions;
use App\Model\Users as UsersModel;

/**
 * Class Users
 * @property \App\Model\Users $model
 */
class Users extends Controller
{
    /**
     * @var \App\Helper\Validator
     */
    private $validator;

    /**
     * Users constructor.
     *
     */
    public function __construct()
    {
        parent::__construct(UsersModel::class);
        $this->validator = new Validator();
    }

    /**
     * Home page
     *
     * @return void|null
     */
    public function index()
    {
        if (empty($_SESSION) || $_SESSION["role_id"] != "1") {
            HtmlRender::viewHome();

            return;
        }
        $users = $this->model->getUsersRoles();
        HtmlRender::viewUsersIndex($users);
    }

    /**
     * Page for register user
     *
     * @return void|null
     */
    public function register()
    {
        $status = $this->validator->checkPost($_POST);
        if (is_string($status)) {
            HtmlRender::viewRegister($status);

            return;
        }
        $username = trim(strtolower($_POST["username"]));
        $email    = $_POST["email"];
        $pass     = $_POST["password"];
        $user     = $this->model->checkIfExists($username, $email);
        if ($user) {
            $status = $this->validator->isAny($user->username, $username, $user->email, $email);
            HtmlRender::viewRegister($status);

            return;
        }
        $this->model->register($username, $email, sha1($pass));
        $status = "Successfully registered";
        HtmlRender::viewRegister($status);
    }

    /**
     * Page for login user
     * @return void|null
     */
    public function login()
    {
        $status = $this->validator->checkPost($_POST);
        if (is_string($status)) {
            HtmlRender::viewLogin($status);

            return;
        }
        $username = trim(strtolower($_POST["username"]));
        $password = sha1($_POST["password"]);
        $user     = $this->model->getUser($username, $password);
        if (empty($user)) {
            $status = "Try Again! Username or password is incorrect";
            HtmlRender::viewLogin($status);

            return;
        }
        Sessions::set($user);
        HtmlRender::viewHome();
    }
}
