<?php


namespace App\Models\Resource;


use App\Config\Database;

class ResourceModel implements ResourceModelInterface
{
    /**
     * @var
     */
    public $table;

    /**
     * @param $table
     */
    public function __init($table)
    {
        $this->table = $table;
    }

    /**
     * @param $model
     * @return bool
     */
    public function save($model)
    {
        $props = get_object_vars($model);
        unset($props['id']);
        $columns = implode(', ', array_keys($props));
        $values = implode(', ', substr_replace(array_keys($props), ':', 0, 0));

        var_dump($columns, $values,  array_merge($props, [
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]));

        $sql = "INSERT INTO {$this->table} ({$columns}, created_at, updated_at) VALUES ($values, :created_at, :updated_at)";

        $req = Database::getBdd()->prepare($sql);

        $create = $req->execute(
            array_merge($props, [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ])
        );

        if ($create) {
            $model->id = Database::getBdd()->lastInsertId();
            return $model;
        }
        return null;
    }


    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute([$id]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id =" . $id;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch();
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $sql = "SELECT * FROM {$this->table}";

        $req = Database::getBdd()->prepare($sql);

        $req->execute();

        return $req->fetchAll();
    }

    /**
     * @param $model
     * @return bool
     */
    public function update($model)
    {
        $props = get_object_vars($model);

        $columnSql = [];
        foreach ($props as $column => $value) {
            $columnSql[] = "{$column} = :{$column}";
        }
        $columnSql = implode(', ', $columnSql);

        $sql = "UPDATE {$this->table} SET {$columnSql}, updated_at = :updated_at WHERE id = :id";

        $req = Database::getBdd()->prepare($sql);

        return $req->execute(
            array_merge($props, [
                'updated_at' => date('Y-m-d H:i:s')
            ])
        );
    }

}