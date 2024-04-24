<?php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "ecommerce";
    protected $connection;

    // Konstruktor untuk membuat koneksi ke database
    public function __construct() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        // Memeriksa koneksi
        if ($this->connection->connect_error) {
            die("Koneksi gagal: " . $this->connection->connect_error);
        }
    }

    // Mendapatkan koneksi database
    public function getConnection() {
        return $this->connection;
    }
}
?>
