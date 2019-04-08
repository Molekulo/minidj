<?php

namespace App\Controller;

use App\Core\Controller;
use App\Helper\HtmlRender;
use App\Model\Roles;
use App\Model\Users;

/**
 * Class Admin
 * @package App\Controller
 * @property Users $userModel
 */
class Admin extends Controller
{
    /**
     * @var Users
     */
    protected $userModel;

    /**
     * Admin constructor.
     */
    public function __construct()
    {
        parent::__construct(Roles::class);
        $this->userModel = new Users();
    }

    /**
     * @return void
     */
    public function index()
    {
        if (empty($_SESSION) || $_SESSION["role_id"] != "1") {
            HtmlRender::viewHome();

            return;
        }
        $rolesModel      = $this->model;
        $allRoles        = $this->model->getAll(0);
        $allDeletedRoles = $this->model->getAll(1);
        HtmlRender::viewRoles($allRoles, $allDeletedRoles, $rolesModel);
    }

    /**
     * @param int $userId
     *
     * @return \Illuminate\Http\RedirectResponse|null
     */
    public function edit($userId)
    {
        if (isset($userId)) {
            $rolesModel = $this->model;
            $roles      = $rolesModel->all();
            $userModel  = $this->userModel;
            $user       = $userModel->find($userId);
            HtmlRender::viewEditUsers($user, $roles);

            return null;
        }

        return $this->redirector->to("users");
    }

    /**
     * @param int $userId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($userId)
    {
        if (isset($_POST["submit_update_role"])) {
            $params    = [
                "role_id" => $_POST["role"],
            ];
            $userModel = $this->userModel;
            $userModel->update($params, $userId);
        }

        return $this->redirector->to("users");
    }
}
