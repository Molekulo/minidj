<?php

namespace App\Model;

/**
 * Class Roles
 * @package App\Model
 * @property string $name
 */
class Roles extends Model
{
    protected $softDelete = false;
    /**
     * @param int $id
     *
     * @return Object
     */
    public function getSum($id)
    {
        $sql           = "SELECT count(users.role_id) as summary FROM users
                INNER JOIN roles ON roles.id = users.role_id
                WHERE users.role_id = :id";
        $params[":id"] = $id;
        $query         = self::$db->prepare($sql);
        $query->execute($params);

        return $query->fetch(\PDO::FETCH_OBJ);
    }

    /**All roles
     *
     * @param int $where
     *
     * @return array
     */
    public function getAll($where)
    {
        $sql                = "SELECT * FROM " . $this->table . " WHERE deleted = :deleted";
        $params[":deleted"] = $where;
        $query              = self::$db->prepare($sql);
        $query->execute($params);

        return $query->fetchAll();
    }

    /**
     * @param string $name
     *
     * @return Object
     */
    public function checkRole($name)
    {
        $sql             = "SELECT id, name FROM " . $this->table . " WHERE name = :name";
        $params[':name'] = $name;
        $query           = self::$db->prepare($sql);
        $query->execute($params);

        return $query->fetch(\PDO::FETCH_OBJ);
    }
}
