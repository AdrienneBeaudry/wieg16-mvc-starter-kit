<?php
/**
 * Created by PhpStorm.
 * User: marcusdalgren
 * Date: 2017-04-25
 * Time: 20:57
 */

namespace App\Models;


abstract class Model {
    protected $id;
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getById($id) {
        $result = $this->db->query('SELECT * FROM recipes WHERE id = '.$id);

    }


}