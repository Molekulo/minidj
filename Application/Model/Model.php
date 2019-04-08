<?php

namespace App\Model;

/**
 * Class Model
 *
 * @package App\Model
 *
 */
abstract class Model
{
    /**
     * @var \PDO
     */
    public static $db;

    /**
     * @var string
     */
    public $table;

    /**
     * @var bool
     */
    protected $softDelete = true;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->loadTable();
    }

    /**
     * Loads the "table".
     * @return void
     */
    private function loadTable()
    {
        $table       = explode('\\', get_called_class());
        $this->table = strtolower($table[2]);
    }

    /**
     * @return array
     */
    public function all()
    {
        if ($this->softDelete) {
            $sql                = "SELECT * FROM " . $this->table . " WHERE deleted = :deleted";
            $params[':deleted'] = 0;
            $query              = self::$db->prepare($sql);
            $query->execute($params);
        }
        else {
            $sql   = "SELECT * FROM " . $this->table;
            $query = self::$db->prepare($sql);
            $query->execute();
        }

        return $query->fetchAll();
    }

    /**
     * @param int $id
     *
     * @return bool|null
     */
    public function delete($id)
    {
        if ($this->softDelete) {
            $this->softDelete($id);

            return null;
        }

        $sql           = "DELETE FROM " . $this->table . " WHERE id = :id";
        $params[':id'] = $id;
        $query         = self::$db->prepare($sql);

        return $query->execute($params);
    }

    /**
     * @param int $id
     *
     * @return Object
     */
    public function find($id)
    {
        $sql           = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $params[':id'] = $id;
        if ($this->softDelete) {
            $sql .= " AND deleted = 0";
        }
        $query         = self::$db->prepare($sql);
        $query->execute($params);

        return $query->fetch(\PDO::FETCH_OBJ);
    }

    /**
     * @param array $params
     * @param int   $id
     *
     * @return void
     */
    public function update($params, $id)
    {
        $sql = "UPDATE " . $this->table . " SET ";
        $i   = 0;
        foreach ($params as $key => $value) {
            $sql .= $key . "=:" . $key;
            $i++;
            if ($i != count($params)) {
                $sql .= ", ";
            }
            else {
                $sql .= " ";
            }
            $params[":" . $key] = $value;
            unset($params[$key]);
        }
        $sql           .= "WHERE id =:id";
        $params[':id'] = $id;
        $query         = self::$db->prepare($sql);
        $query->execute($params);
    }

    /**
     * @param array $params
     *
     * @return bool
     */
    public function add($params)
    {
        $sql   = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $this->table,
            implode(', ', array_keys($params)),
            ':' . implode(', :', array_keys($params))
        );
        $query = self::$db->prepare($sql);

        return $query->execute($params);
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function softDelete($id)
    {
        $sql           = "UPDATE " . $this->table . " SET deleted = '1' WHERE id = :id";
        $params[':id'] = $id;
        $query         = self::$db->prepare($sql);

        return $query->execute($params);
    }
}
