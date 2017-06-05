<?php

namespace App\Controllers;

use App\Database;

class Controller {
	/**
	 * @var string
	 */
	private $baseDir;
    /**
     * @var Database
     */
    private $db;

    public function __construct($baseDir, Database $db) {
		$this->baseDir = $baseDir;
        $this->db = $db;
    }

	public function index() {
		require $this->baseDir.'/views/index.php';
	}

	/**
	 * @return string
	 */
	public function getBaseDir() {
		return $this->baseDir;
	}

	/**
	 * @param string $baseDir
	 */
	public function setBaseDir($baseDir) {
		$this->baseDir = $baseDir;
	}

    public function addNewFabric($data)
    {
        $fabricModel = new fabricModel($this->db);
        $fabricId = $fabricModel->create($data);
        header('Location:/fabrics');
    }

    public function updateFabrics() {
	    echo "THIS IS UPDATE FABRICS";
    }
}