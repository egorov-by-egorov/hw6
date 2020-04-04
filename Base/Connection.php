<?php


namespace Base;

use PDO;

class Connection
{
    public $db;

    public function connect()
    {
        $user = "root";
        $pass = "";
        $dbname = "vp_002";
        $this->db = new PDO('mysql:host=localhost;dbname=' . $dbname, $user, $pass);
    }
}