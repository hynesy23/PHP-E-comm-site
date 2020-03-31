<?php 

// class Database {
//     private $host = "localhost";
//     private $username = "cillian";
//     private $password = "test1234";
//     private $db_name = "shop_cart_mysql_1";
//     private $conn;

//     public function getConnection() {
//         $this->conn = null;

//         $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database) or die(mysqli_error($this->conn));

//         echo "Success";
//     }

// }

$host = "localhost";
$username = "root";
$password = "Liverpool1";
$db_name = "shop_cart_mysql_1";
    
// Create connection
$conn = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    
    die("**Custom message from database.php: Connection failed: " . $conn->connect_error);
}

?>