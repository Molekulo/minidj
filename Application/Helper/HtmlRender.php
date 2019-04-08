<?php

namespace App\Helper;

/**
 * Class HtmlRender
 * @package App\Helper
 */
class HtmlRender
{
    public static function viewUsersIndex($params)
    {
        $users = $params;
        require APP . '/../view/_templates/header.php';
        require APP . '/../view/users/index.php';
        require APP . '/../view/_templates/footer.php';
    }

    public static function viewHome()
    {
        require APP . '/../view/_templates/header.php';
        require APP . '/../view/home/index.php';
        require APP . '/../view/_templates/footer.php';
    }

    public static function viewRoles($roles, $deletedRoles, $rolModel)
    {
        $allRoles        = $roles;
        $rolesModel      = $rolModel;
        $allDeletedRoles = $deletedRoles;
        require APP . '/../view/_templates/header.php';
        require APP . '/../view/admin/index.php';
        require APP . '/../view/_templates/footer.php';
    }

    public static function viewRegister($stat)
    {
        $status = $stat;
        require APP . '/../view/_templates/header.php';
        require APP . '/../view/users/register.php';
        require APP . '/../view/_templates/footer.php';
    }

    public static function viewLogin($stat)
    {
        $status = $stat;
        require APP . '/../view/_templates/header.php';
        require APP . '/../view/users/login.php';
        require APP . '/../view/_templates/footer.php';
    }

    public static function viewSongsIndex($allSongs, $numSongs, $state)
    {
        $songs           = $allSongs;
        $amount_of_songs = $numSongs;
        $status          = $state;
        require APP . '/../view/_templates/header.php';
        require APP . '/../view/songs/index.php';
        require APP . '/../view/_templates/footer.php';
    }

    public static function viewEditRole($roleName, $stat)
    {
        $role   = $roleName;
        $status = $stat;
        require APP . '/../view/_templates/header.php';
        require APP . '/../view/admin/edit.php';
        require APP . '/../view/_templates/footer.php';
    }

    public static function viewEditSongs($songName, $stat)
    {
        $song   = $songName;
        $status = $stat;
        require APP . '/../view/_templates/header.php';
        require APP . '/../view/songs/edit.php';
        require APP . '/../view/_templates/footer.php';
    }

    public static function viewEditUsers($userName, $allRoles)
    {
        $user  = $userName;
        $roles = $allRoles;
        require APP . '/../view/_templates/header.php';
        require APP . '/../view/users/edit.php';
        require APP . '/../view/_templates/footer.php';
    }

    public static function viewProblem($error)
    {
        $problem = $error;
        require APP . '/../view/_templates/header.php';
        require APP . '/../view/problem/index.php';
        require APP . '/../view/_templates/footer.php';
    }

    public static function viewSongResult($track)
    {
        $songs = $track;
        require APP . '/../view/_templates/header.php';
        require APP . '/../view/songs/result.php';
        require APP . '/../view/_templates/footer.php';
    }

    public static function viewAddRole($stat)
    {
        $status = $stat;
        require APP . '/../view/_templates/header.php';
        require APP . '/../view/admin/addrole.php';
        require APP . '/../view/_templates/footer.php';
    }

    public static function viewPlaylist($playlist, $stat = null)
    {
        $songs  = $playlist;
        $status = $stat;
        require APP . '/../view/_templates/header.php';
        require APP . '/../view/playlist/index.php';
        require APP . '/../view/_templates/footer.php';
    }
}
