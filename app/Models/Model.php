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
    public function create($data) {
        return $this->db->create($this->table, $data);
    }
}