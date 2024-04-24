
<?php
class Model {
    private $connection;

    public function __construct() {
        require_once 'config.php';
        $this->connection = (new Database())->getConnection();
    }

    // Fungsi untuk menambahkan data ke dalam tabel
    public function add($data) {
        // Check if email already exists
        $email = $data['user_email'];
        $checkQuery = "SELECT * FROM tb_users WHERE user_email = '$email'";
        $result = $this->runQuery($checkQuery);

        if ($result->num_rows > 0) {
            return "Email sudah ada dalam database.";
        }

        // Jika email belum ada, tambahkan data ke dalam tabel
        $columns = implode(", ", array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";

        $query = "INSERT INTO tb_users ($columns) VALUES ($values)";
        return $this->runQuery($query);
    }

    // Fungsi untuk mengeksekusi query
    public function runQuery($query) {
        return $this->connection->query($query);
    }

    public function addProduct($data) {
        $columns = implode(", ", array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";
    
        $query = "INSERT INTO tb_produk ($columns) VALUES ($values)";
    
        return $this->runQuery($query);
    }
    
}
?>
