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
        //'category,composition,pattern_id,fabric_date_added';

        $bindingSql = ':'.implode(', :', $columns);
        //':fabric_img_url, :category, :composition, :pattern_id, :fabric_date_added';

        //$sql = 'INSERT INTO `' . $table .'` (`' . $columnSql . '`) VALUES (' . $bindingSql . ')';

        $sql = "INSERT INTO $table ($columnSql) VALUES ($bindingSql)";
        $stm = $this->pdo->prepare($sql);

        // INSERT INTO `fabrics` (`id`, `category`, `composition`, `pattern_id`, `fabric_img_url`) VALUES (NULL, 'FSD', 'DSJHFDS', 'FHDS', 'FSDFDKJH');
        //$sql = $db->prepare("INSERT INTO db_fruit (id, type, colour) VALUES (:id, :name, :color)");
       // $sql->execute(array('id' => $newId, 'name' => $name, 'color' => $color));


        foreach ($data as $key => $value) {
            $stm->bindValue(':'.$key, $value);
        }
        $status = $stm->execute();

        return ($status) ? $this->pdo->lastInsertId() : false;
    }

    /**
     * ÖVERKURS
     *
     * Skriv den här själv!
     * Titta på create för strukturidéer
     * Du kan binda parametrar precis som i create
     * Klura ut hur du skall sätt ihop rätt textsträng för x=y...
     * Implode kommer inte ta dig hela vägen den här gången
     * Kanske array_map eller foreach?

     */



    public function update($table, $id, $data) {
        //removes first element of array, in this case update=>submit, which is neede because
        // I have two forms on update.php, one delete and one update
        //$data = array_shift($data);
        $columns = array_keys($data);

        //$keys före
        // ['name', 'description']
        $columns = array_map(function($item) {
            return $item . '=:' . $item;
        }, $columns);

        //$columns efter
        //['name=:name', etc]
        //implode: 'name=:name,description

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
//DELETE FROM `fabrics` WHERE `fabrics`.`id` = 43


    /**
     * Skriv den här själv!
     * Titta på getById för struktur

    public function delete($table, $id) {
     * TIP: no need to fetch method inside DELETE function. Can simply take the same code as GET
     * stop after execute.
     *
    }
    /*
    public function save($table, $data) {
        if (isset($data['id'])) {
            return $this->update($table,$data['id'], $data);
        }
        else {
            return $this->create($table, $data);
        }
    }
*/






//}



/*
$config = require('config/config.php');

class Database extends PDO
{
    public function __construct($config)
    {
        try {
            parent::__construct($config['db_type'] . ':host=' . $config['db_host'] . ';dbname='
                . $config['db_name'] . $config['db_username'] . $config['db_password']);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e)
        {
            die('ERROR: ' . $e->getMessage());
        }
    }
}

*/
}