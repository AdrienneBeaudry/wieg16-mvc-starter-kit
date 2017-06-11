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
        LEFT JOIN fabrics ON {$this->table}.fabric_id = fabrics.id
        WHERE fabrics.id = :id
        GROUP BY {$this->table}.id";
        $stm = $this->db->getPdo()->prepare($sql);
    }

    public function getAllWithFabrics() {
        $patterns = array_map(function($item) {
            return $item['pattern_id'];
        }, $this->db->getAll('fabrics_patterns'));
        $patterns = array_unique($patterns);

        return array_map(function($pattern) {
            return [
                "pattern" => $this->db->getById('patterns', $pattern),
                "fabrics" =>$this->db->getRelatedFabrics($pattern)
            ];
        }, $patterns);
    }

}