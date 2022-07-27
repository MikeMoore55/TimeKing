<?php
class DB
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = 'root';
    private $dbname = 'timekings_db';

    // -- ensure pdo extensions for php are enabled to ensure connection to drivers --
    public function connect()
    {
        $conn_str = "mysql:host=$this->host;dbname=$this->dbname";
        $conn = new PDO($conn_str, $this->user, $this->pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }
}

?>