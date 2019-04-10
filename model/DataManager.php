<?php

// require('./db.php');

class DataManager {

    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getData($zodiac) {
        $req = $this->db->query('SELECT * FROM '.$zodiac.' ORDER BY date DESC LIMIT 1');
        $data = $req->fetch();
        return $data;
    }
}
