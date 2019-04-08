<?php

namespace App\Controller;

use App\Core\Controller;
use App\Helper\HtmlRender;
use App\Model\Songs;

/**
 * Class Playlist
 * @package App\Controller
 */
class Playlist extends Controller
{
    /**
     * Playlist constructor.
     */
    public function __construct()
    {
        parent::__construct(Songs::class);
    }

    /**
     * Index for playlist
     * @return void
     */
    public function index()
    {
        if (empty($_SESSION) || $_SESSION["role_id"] != "2") {
            HtmlRender::viewHome();

            return;
        }

        $userId = $_SESSION["user_id"];
        $songs  = $this->model->getSongs($userId);
        HtmlRender::viewPlaylist($songs);
    }

    /**
     * Add song to playlist
     * @return void
     */
    public function create()
    {
        if (empty($_SESSION)) {
            $this->index();

            return;
        }

        if (empty($_POST["artist"]) || empty($_POST["track"]) || empty($_POST["link"])) {
            $status = "Check all fields!";
            $songs  = $this->model->getSongs($_SESSION["user_id"]);
            HtmlRender::viewPlaylist($songs, $status);

            return;
        }
        $params = [
            "artist"  => $_POST["artist"],
            "track"   => $_POST["track"],
            "link"    => $_POST["link"],
            "user_id" => $_SESSION["user_id"],
        ];

        $this->model->add($params);
        $songs = $this->model->getSongs($_SESSION["user_id"]);
        HtmlRender::viewPlaylist($songs);
    }
}
