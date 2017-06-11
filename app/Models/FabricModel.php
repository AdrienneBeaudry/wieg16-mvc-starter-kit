<?php
/**
 * Created by PhpStorm.
 * User: Adrienne Beaudry
 * Date: 2017-04-28
 * Time: 14:27
 */

namespace App\Models;


use App\Database;

class FabricModel extends Model
{
    protected $table = 'fabrics';

    public function getAllWithPatterns() {
        $fabrics = array_map(function($item) {
            return $item['fabric_id'];
        }, $this->db->getAll('fabrics_patterns'));
        $fabrics = array_unique($fabrics);

        return array_map(function($fabric) {
            return [
                "fabric" => $this->db->getById('fabrics', $fabric),
                "patterns" =>$this->db->getRelatedPatterns($fabric)
            ];
        }, $fabrics);
    }
}