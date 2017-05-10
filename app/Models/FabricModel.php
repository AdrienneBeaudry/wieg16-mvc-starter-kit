<?php
/**
 * Created by PhpStorm.
 * User: Adrienne Beaudry
 * Date: 2017-04-28
 * Time: 14:27
 */

namespace App\Models;


use App\Database;

class FabricModel extends Model {

    protected $table = 'fabrics';

    public function __get($name)
    {
        if (isset($this->table[$name])) {
            return $this->table[$name];
        }
        else {
            return false;
        }
    }

    public function __set($name, $value)
    {
        $this->table[$name] = $value;

    }

}