<?php
// 'product image' object
class ProductImage {
 
    // database connection and table name
    private $conn;
    private $table_name = "product_images";
 
    // object properties
    public $id;
    public $product_id;
    public $name;
    public $timestamp;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }

    // read the first product iamge related to a product
    function readFirst() {
 
        // select query
        $query = "SELECT id, product_id, name FROM " . $this->table_name . " WHERE product_id = ? ORDER BY name DESC LIMIT 0, 1";
     
        $stmt = mysqli_stmt_init($this->conn);

        // prepare query statement
        if (!mysqli_stmt_prepare($stmt, $query)) {

            echo "Prepare in Product_image failed";

        } else {

        // sanitize
        $this->id = htmlspecialchars(($this->id));
     
        // bind prodcut id variable
        mysqli_stmt_bind_param($stmt, 'i', $this->product_id);
     
        // execute query
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $row = mysqli_fetch_assoc($result); // creates an associative array from the returned data


        return $row["name"];
     
        // return values
        return $stmt;
        }
             
    }

    // read all product image related to a product
function readByProductId() {

    $array = array();
 
    // select query
    $query = "SELECT id, product_id, name
            FROM " . $this->table_name . "
            WHERE product_id = 29
            ORDER BY name ASC";

    $stmt = mysqli_stmt_init($this->conn);
 
    // prepare query statement
    if (!mysqli_stmt_prepare($stmt, $query)) {

        echo "Prepare from readProdById failed";

    } else {

        // sanitize
        $this->product_id=htmlspecialchars(strip_tags($this->product_id));
          
        // execute query
        mysqli_stmt_execute($stmt);

        // get actual result
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {

            $array[] = $row;

        }

        return $array;

      }
 
}
}