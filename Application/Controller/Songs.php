<?php

namespace App\Controller;

use App\Core\Controller;
use App\Helper\HtmlRender;
use App\Helper\Validator;
use App\Model\Songs as SongsModel;

/**
 * Class Songs
 * @package App\Controller
 * @property \App\Model\Songs $model
 */
class Songs extends Controller
{
    /**
     * Songs constructor.
     */
    public function __construct()
    {
        parent::__construct(SongsModel::class);
    }

    /**
     * Index for songs
     * @return null|void
     */
    public function index()
    {
        if (empty($_SESSION) || $_SESSION["role_id"] == "2") {
            HtmlRender::viewHome();

            return;
        }
        $songs         = $this->model->all();
        $amountOfSongs = count($songs);
        HtmlRender::viewSongsIndex($songs, $amountOfSongs, false);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        $status = (new Validator())->checkPost($_POST);
        if (is_string($status)) {
            $songs         = $this->model->all();
            $amountOfSongs = count($songs);
            HtmlRender::viewSongsIndex($songs, $amountOfSongs, $status);

            return null;
        }
        if (isset($_POST["submit_add_song"]) && isset($_SESSION["user_id"])) {
            $params = [
                "artist"  => $_POST["artist"],
                "track"   => $_POST["track"],
                "link"    => $_POST["link"],
                "user_id" => $_SESSION["user_id"],
            ];
            $this->model->add($params);
        }

        return $this->redirector->to("/songs");
    }

    /**
     * @param int $songId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($songId)
    {
        if (isset($songId) && isset($_SESSION["role_id"])) {
            $this->model->delete($songId);
        }
        if (isset($_SESSION["role_id"]) && $_SESSION["role_id"] == 2) {
            return $this->redirector->to("/playlist");
        }

        return $this->redirector->to("/songs");
    }

    /**
     * @param int $songId
     *
     * @return \Illuminate\Http\RedirectResponse|null
     */
    public function edit($songId)
    {
        if (isset($songId)) {
            $song = $this->model->find($songId);
            HtmlRender::viewEditSongs($song, false);

            return null;
        }

        return $this->redirector->to("/songs");
    }

    /**
     * @param int $songId
     *
     * @return \Illuminate\Http\RedirectResponse|null
     */
    public function update($songId)
    {
        $status = (new Validator())->checkPost($_POST);
        if (is_string($status)) {
            $song = $this->model->find($songId);
            HtmlRender::viewEditSongs($song, $status);

            return null;
        }
        if ($status && isset($_SESSION["role_id"])) {
            $params = [
                "artist" => $_POST["artist"],
                "track"  => $_POST["track"],
                "link"   => $_POST["link"],
            ];
            $this->model->update($params, $songId);
        }
        if (isset($_SESSION["role_id"]) && $_SESSION["role_id"] == 2) {
            return $this->redirector->to("/playlist");
        }

        return $this->redirector->to("/songs");
    }

    /**
     * @return void
     */
    public function result()
    {
        $song   = !empty($_GET["search"]) ? $_GET["search"] : null;
        $result = $this->model->getSongOrArtist($song);
        if ($result) {
            HtmlRender::viewSongResult($result);

            return;
        }
        HtmlRender::viewSongResult($result);
    }
}
