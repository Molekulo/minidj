<?php

namespace App\Core;

use App\Model\Model;
use App\Helper\HtmlRender;

/**
 * Class Controller
 * @package App\Core
 */
abstract class Controller
{
    /**
     * @var \Illuminate\Routing\Redirector
     */
    protected $redirector;

    /**
     * @var Model
     */
    protected $model = null;

    /**
     * @var \PDO
     */
    protected $db;

    /**
     * Controller constructor.
     *
     * @param string $model
     */
    public function __construct($model = null)
    {
        global $redirect;
        $this->redirector = $redirect;
        $this->openDatabaseConnection();
        Model::$db = $this->db;
        if ($model) {
            $this->loadModel($model);
        }
    }

    /**
     * Open database connection
     */
    private function openDatabaseConnection()
    {
        $options = [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_WARNING,
        ];

        try {
            $this->db = new \PDO(
                DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET,
                DB_USER,
                DB_PASS,
                $options
            );
        } catch (\PDOException $ex) {
            $problem = $ex->getMessage();
            HtmlRender::viewProblem($problem);
            exit;
        }
    }

    /**
     * @param string $model
     */
    public function loadModel($model)
    {
        $this->model = new $model($this->db);
    }
}
