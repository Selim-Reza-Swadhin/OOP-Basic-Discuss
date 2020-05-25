<?php
//declare(strict_types=1);

class DBConnect
{
    protected $db;
    protected $host = "localhost";
    protected $db_name = "login_logout";

    public function __construct($db = null)
    {
        if (is_object($db)) {
            $this->db = $db;
        } else {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name;
            try {
                $this->db = new PDO($dsn, "root", "");
            } catch (Exception $e) {
                //in case of failure output the error
                die($e->getMessage());
            }
        }
    }

    public function get_db()
    {
        return $this->db;
    }


}