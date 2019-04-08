<?php

namespace App\Model;

/**
 * Class Songs
 * @package App\Model
 */
class Songs extends Model
{
    /**
     * @param string $name
     *
     * @return array
     */
    public function getSongOrArtist($name)
    {
        $sql    = "SELECT artist, track, link, users.username FROM " . $this->table . " 
                INNER JOIN users ON users.id = songs.user_id WHERE songs.deleted = 0 AND
                  (songs.track LIKE :track OR songs.artist LIKE :artist)";
        $query  = self::$db->prepare($sql);
        $artist = "%" . $name . "%";
        $track  = "%" . $name . "%";
        $params = [":track" => $track, ":artist" => $artist];
        $query->execute($params);

        return $query->fetchAll();
    }

    /**
     * @param int $userId
     *
     * @return array
     */
    public function getSongs($userId)
    {
        $sql    =
            "SELECT id, artist, track, link FROM " . $this->table . " WHERE user_id = :user_id AND deleted = :deleted";
        $params = [":user_id" => $userId, ":deleted" => 0];
        $query  = self::$db->prepare($sql);
        $query->execute($params);

        return $query->fetchAll();
    }
}
