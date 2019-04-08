<?php

namespace App\Controller;

use App\Core\Controller;
use App\Helper\HtmlRender;
use App\Model\Roles;
Use App\Helper\Validator;

/**
 * Class Privileges
 * @package App\Controller
 * @property \App\Model\Roles $model
 */
class Privileges extends Controller
{
    /**
     * Privileges constructor.
     */
    public function __construct()
    {
        parent::__construct(Roles::class);
    }

    /**
     *Index for Privileges
     */
    public function index()
    {
        HtmlRender::viewHome();
    }

    /**
     * @param int $roleId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($roleId)
    {
        if (isset($roleId)) {
            $this->model->delete($roleId);
        }

        return $this->redirector->to("/admin");
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|null
     */
    public function create()
    {
        if (empty($_POST["name"])) {
            $status = "Field must not be empty!";
            HtmlRender::viewAddRole($status);

            return null;
        }
        if (isset($_POST["addRole"])) {
            $params = [
                "name" => $_POST["name"],
            ];
            $role   = $this->model->checkRole($_POST["name"]);
            if ($role) {
                $status = "Role " . $_POST["name"] . " already exists. Try again!";
                HtmlRender::viewAddRole($status);

                return null;
            }
            $this->model->add($params);
        }

        return $this->redirector->to("/admin");
    }

    /**
     * @param int $roleId
     *
     * @return \Illuminate\Http\RedirectResponse|null
     */
    public function edit($roleId)
    {
        if (isset($roleId)) {
            $role = $this->model->find($roleId);
            HtmlRender::viewEditRole($role, null);

            return null;
        }

        return $this->redirector->to("/admin");
    }

    /**
     * @param int $roleId
     *
     * @return \Illuminate\Http\RedirectResponse|null
     */
    public function update($roleId)
    {
        $status = (new Validator())->checkPost($_POST);
        if (is_string($status)) {
            HtmlRender::viewEditRole(null, $status);

            return null;
        }
        if (!empty($_POST["role"]) && isset($_POST["submit_update_role"])) {
            $params = [
                "name" => $_POST["role"],
            ];
            $role   = $this->model->checkRole($_POST["role"]);
            if ($role) {
                HtmlRender::viewEditRole($role, null);

                return null;
            }
            $this->model->update($params, $roleId);
        }

        return $this->redirector->to("/admin");
    }

    /**
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activateRole($id)
    {
        $params     = $this->model->find($id);
        $parameters = [
            "deleted" => 0,
        ];
        $id         = $params->id;
        $this->model->update($parameters, $id);

        return $this->redirector->to("/admin");
    }
}
