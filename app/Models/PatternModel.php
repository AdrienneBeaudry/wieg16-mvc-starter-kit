<?php
/**
 * Created by PhpStorm.
 * User: Adrienne Beaudry
 * Date: 2017-04-28
 * Time: 14:27
 */

namespace App\Models;


class PatternModel extends Model {
    protected $table = 'patterns';

    public function getPatternsByFabricId($id) {
        $sql = "SELECT {$this->table}.* FROM {$this->table}
        LEFT JOIN fabrics ON {$this->table}.pattern_id = fabrics.pattern_id
        WHERE fabrics.pattern_id = :id
        GROUP BY {$this->table}.pattern_id";
        $stm = $this->db->getPdo()->prepare($sql);
    }
}