<?php

namespace App;

use PDO;

class Database {
    /**
     * @var PDO
     */
    private $pdo;

    /**
     * @param integer $id
     * @return Model
     */
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function getPdo() {
        return $this->pdo;
    }
    public function getById($table, $id){
        $stm = $this->pdo->prepare('SELECT * FROM '.$table.' WHERE id = :id');
        $stm->bindValue(':id', $id);
        $success = $stm->execute();
        $row = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }

    public function getAll($table) {
        $stm = $this->pdo->prepare("SELECT * FROM $table");
        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows : [];
    }

    public function fullJoin($table1, $table2, $overlapColumn) {
        $stm = $this->pdo->prepare('SELECT * FROM `'.$table1.'`INNER JOIN `'.
            $table2.'`ON `'.$table1.'`.`'.$overlapColumn.'`=`'.$table2.'`.`'.$overlapColumn.'`');
        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows : [];
    }


    public function create($table, $data) {
        $columns = array_keys($data);
        $columnSql = implode(',', $columns);
        $bindingSql = ':'.implode(', :', $columns);
        $sql = "INSERT INTO $table ($columnSql) VALUES ($bindingSql)";
        $stm = $this->pdo->prepare($sql);
        foreach ($data as $key => $value) {
            $stm->bindValue(':'.$key, $value);
        }
        $status = $stm->execute();
        return ($status) ? $this->pdo->lastInsertId() : false;
    }


    public function update($table, $id, $data) {
        $columns = array_keys($data);
        $columns = array_map(function($item) {
            return $item . '=:' . $item;
        }, $columns);
        $bindingSql= implode(',', $columns);
        $sql = "UPDATE $table SET $bindingSql WHERE id=:id";
        $stm = $this->pdo->prepare($sql);
        $data['id'] = $id;
        foreach ($data as $key => $value) {
            $stm->bindValue(':'.$key, $value);
        }
        $status = $stm->execute();
        return $status;
    }


    public function delete($table, $id){
        $stm = $this->pdo->prepare("DELETE FROM $table WHERE id = :id");
        $stm->bindParam(':id', $id);
        $success = $stm->execute();
        return ($success) ? $id : [];
    }

}