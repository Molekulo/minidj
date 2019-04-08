<?php

namespace App\Model;

/**
 * Class Users
 * @package App\Model
 *
 * @property int    $id
 * @property int    $role_id
 * @property string $username
 */
class Users extends Model
{
    /**
     * @var int
     */
    public $role_id;

    /**
     * @var string
     */
    public $username;

    /**
     * @var int
     */
    public $id;

    /**
     * Allow user to register
     *
     * @param string $username
     * @param string $email
     * @param string $password
     *
     * @return void
     */
    public function register($username, $email, $password)
    {
        $sql        = "INSERT INTO " . $this->table . " (username, email, password, role_id, deleted) 
                VALUES (:username, :email, :password, 2, 0)";
        $query      = self::$db->prepare($sql);
        $parameters = [':username' => $username, ':email' => $email, ':password' => $password];
        $query->execute($parameters);
    }

    /**
     * @param string $username
     * @param string $password
     *
     * @return Users
     */
    public function getUser($username, $password)
    {
        $sql = "SELECT id, username, password, email, role_id FROM " .
               $this->table .
               " WHERE username = :username AND password = :password";

        $query      = self::$db->prepare($sql);
        $parameters = [":username" => $username, ":password" => $password];
        $query->execute($parameters);

        return $query->fetchObject(Users::class);
    }

    /**
     * @param string $username
     * @param string $email
     *
     * @return object
     */
    public function checkIfExists($username, $email)
    {
        $sql        = "SELECT username, email FROM " . $this->table . " WHERE username = :username OR email = :email";
        $query      = self::$db->prepare($sql);
        $parameters = [":username" => $username, ":email" => $email];
        $query->execute($parameters);

        return $query->fetch(\PDO::FETCH_OBJ);
    }

    /**
     * @return array
     */
    public function getUsersRoles()
    {
        $sql   = "SELECT roles.name, users.id, username, email  FROM " . $this->table . " 
        INNER JOIN roles ON users.role_id = roles.id";
        $query = self::$db->prepare($sql);
        $query->execute();

        return $query->fetchAll(\PDO::FETCH_OBJ);
    }
}
