<?php

namespace App\Models;


class Fabric
{
    private $id;
    private $category;
    private $composition;

    public function __construct($id, $data = [])
    {
        $this->id = $id;
        foreach ($data as $key => $value) {
            // $key = 'composition
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public function toArray() {
        return [
            'category' => $this->category,
            'composition' => $this->composition
        ];
    }
}