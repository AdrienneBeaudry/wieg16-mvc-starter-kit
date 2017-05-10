<?php
/**
 * Created by PhpStorm.
 * User: marcusdalgren
 * Date: 2017-04-25
 * Time: 20:57
 */

namespace App\Models;

use App\Database;

abstract class Model {
    protected $id;
    /**
     * @return mixed
     */
    private $db;

    protected $table = '';

    protected $table2 = '';

    protected $overlapColumn = '';

    public function __construct(Database $db, $modelData= []) {
        $this->db=$db;
    }

    /**
     * @return integer
     */

    public function getId() {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId($id) {
        $this->id = $id;
    }
    /**
     * @param integer $id
     * @return Model
     */
    public function getById($id) {
        return $this->db->getById($this->table, $id);
    }
    public function getAll() {
        return $this->db->getAll($this->table);
    }

    //is the below necessary?? Is the below correct??
    public function fullJoin(){
        return $this->db->fullJoin($this->table, $this->table2, $this->overlapColumn);
    }

    public function create($data) {
        return $this->db->create($this->table, $data);
    }

    //do I need the following two functions?? How should I structure them??
    public function delete($data) {

    }

    public function update($data){

    }

    /*
    public function __get($name)
    {
        // TODO: Implement __get() method.
    }

    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
    }

    public function __call($name, $arguments)
    {
        $tableName = strtolower(substr($name, 3));
        $results = $this->db->fullJoin($tableName, $this->table, ...$arguments);
        return $results;
    }
    */

}