<?php

class User {

    private $conn;
    private $table_name = "users";

    public $id;
    public $name;
    public $username;
    public $email;
    public $password;

    public function __construct($db) {
        $this->conn = $db;
    }

    function register() {

        $query = "SELECT username FROM  " . $this->table_name . " WHERE username = ?";

        $stmt = mysqli_stmt_init($this->conn);
        
        if (!mysqli_stmt_prepare($stmt, $query)) {

            echo "failre in prepare";
            
        } else {

            $this->username = htmlspecialchars(strip_tags($this->username));

            mysqli_stmt_bind_param($stmt, 's', $this->username);

            mysqli_stmt_execute($stmt);
            
            $result = mysqli_stmt_get_result($stmt);

            $row = mysqli_fetch_assoc($result);

            if (count($row) === 0) {

                $query = "INSERT INTO . " . $this->table_name . " (name, username, email, password)
         VALUES (?, ?, ?, ?)";

        $stmt = mysqli_stmt_init($this->conn);

        if (!mysqli_stmt_prepare($stmt, $query)) {

            echo "Prepare in register failed";

            return false;

        } else {
            
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->username = htmlspecialchars(strip_tags($this->username));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->password = htmlspecialchars(strip_tags($this->password));

            mysqli_stmt_bind_param($stmt, 'ssss', $this->name, $this->username, $this->email, $this->password);

            mysqli_stmt_execute($stmt);

            echo "Success in register";

            return true;

            }

        } else {

            return "Username exists";
        }
        
        
        // $query = "INSERT INTO . " . $this->table_name . " (name, username, email, password)
        //  VALUES (?, ?, ?, ?)";

        // $stmt = mysqli_stmt_init($this->conn);

        // if (!mysqli_stmt_prepare($stmt, $query)) {

        //     echo "Prepare in register failed";

        //     return false;

        // } else {
            
        //     $this->name = htmlspecialchars(strip_tags($this->name));
        //     $this->username = htmlspecialchars(strip_tags($this->username));
        //     $this->email = htmlspecialchars(strip_tags($this->email));
        //     $this->password = htmlspecialchars(strip_tags($this->password));

        //     mysqli_stmt_bind_param($stmt, 'ssss', $this->name, $this->username, $this->email, $this->password);

        //     mysqli_stmt_execute($stmt);

        //     echo "Success in register";

        //     return true;

        // }

    }
}

    function login() {

        $array = array();

        $query = "SELECT id FROM  " . $this->table_name . " WHERE email = ?";

        $stmt = mysqli_stmt_init($this->conn);

        if (!mysqli_stmt_prepare($stmt, $query)) {

            echo "Failure in login prepare";

        } else {

            echo "LOGIN FUNC 2";
            
            $this->email = htmlspecialchars(strip_tags($this->email));
            
            mysqli_stmt_bind_param($stmt, 's', $this->email);
            
            mysqli_stmt_execute($stmt);
            
            $result = mysqli_stmt_get_result($stmt);

            $row = mysqli_fetch_assoc($result);

            var_dump($row);

            echo $row['id'];

           $_SESSION["id"] = $row["id"];

            return true;
          
        }

    }

}