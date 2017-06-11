<?php

namespace App;

use PDO;

class Database
{
    /**
     * @var PDO
     */
    private $pdo;

    /**
     * @param integer $id
     * @return Model
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    public function getById($table, $id)
    {
        $stm = $this->pdo->prepare('SELECT * FROM ' . $table . ' WHERE id = :id');
        $stm->bindValue(':id', $id);
        $success = $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }

    public function getAll($table)
    {
        $stm = $this->pdo->prepare("SELECT * FROM $table");
        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows : [];
    }

    public function getAllOrder($table)
    {
        $stm = $this->pdo->prepare("SELECT * FROM $table ORDER BY `created_at` DESC, `updated_at` DESC");
        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows : [];
    }

    public function fullJoin($table1, $table2, $overlapColumn1, $overlapColumn2)
    {
        $stm = $this->pdo->prepare('SELECT * FROM `' . $table1 . '`INNER JOIN `' .
            $table2 . '`ON `' . $table1 . '`.`' . $overlapColumn1 . '`=`' . $table2 . '`.`' . $overlapColumn2 . '`');
        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows : [];
    }


    public function create($table, $data)
    {
        $dataCopy = $data;
        if (isset($data['paired'])) {
            $data = array_pop($data);
            return $data;
        }
        $columns = array_keys($data);
        $columnSql = implode(',', $columns);
        $bindingSql = ':' . implode(', :', $columns);
        $sql = "INSERT INTO $table ($columnSql) VALUES ($bindingSql)";
        $stm = $this->pdo->prepare($sql);
        foreach ($data as $key => $value) {
            $stm->bindValue(':' . $key, $value);
        }
        $status = $stm->execute();
        if($status){
            if(isset($pairing)){
                //write code for saving new pairing in db here using $this->pdo->lastInsertId();
            }
            else {
                return $this->pdo->lastInsertId();
            }
        }
        else {
            false;
        }

    }


    public function update($table, $id, $data)
    {
        $columns = array_keys($data);
        $columns = array_map(function ($item) {
            return $item . '=:' . $item;
        }, $columns);
        $bindingSql = implode(',', $columns);
        $sql = "UPDATE $table SET $bindingSql WHERE id=:id";
        $stm = $this->pdo->prepare($sql);
        $data['id'] = $id;
        foreach ($data as $key => $value) {
            $stm->bindValue(':' . $key, $value);
        }
        $status = $stm->execute();
        return $status;
    }


    public function delete($table, $id)
    {
        $stm = $this->pdo->prepare("DELETE FROM $table WHERE id = :id");
        $stm->bindParam(':id', $id);
        $success = $stm->execute();
        return $success;
        //return ($success) ? $id : [];
    }

    public function deletePairing($table, $fabric_id, $pattern_id)
    {
        $stm = $this->pdo->prepare("DELETE FROM $table WHERE fabric_id = :fabric_id AND pattern_id = :pattern_id");
        $stm->bindValue(':fabric_id', $fabric_id);
        $stm->bindValue(':pattern_id', $pattern_id);
        $status = $stm->execute();
        return $status;
        //return ($success) ? $fabric_id : [];
    }

    //gets all patterns related to a particular fabric
    public function getRelatedPatterns($id)
    {
        $stm = $this->pdo->prepare("SELECT * FROM patterns 
                  LEFT JOIN fabrics_patterns 
                  ON patterns.id = fabrics_patterns.pattern_id
                  WHERE fabrics_patterns.fabric_id = :id");
        $stm->bindParam(':id', $id);
        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows : [];
    }

    //gets all fabrics related to a particular pattern
    public function getRelatedFabrics($id)
    {
        $stm = $this->pdo->prepare("SELECT * FROM fabrics 
                  LEFT JOIN fabrics_patterns 
                  ON fabrics.id = fabrics_patterns.fabric_id
                  WHERE fabrics_patterns.pattern_id = :id");
        $stm->bindParam(':id', $id);
        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows : [];
    }
}