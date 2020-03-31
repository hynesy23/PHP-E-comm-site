<?php
// 'product' object
class Product {
 
    // database connection and table name
    private $conn;
    private $table_name = "products";
 
    // object properties
    public $id;
    public $name;
    public $price;
    public $description;
    public $category_id;
    public $category_name;
    public $timestamp;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }

    function read($from_record_num, $records_per_page) {

        $row = array();

        $query = "SELECT id, name, description, price FROM products ORDER BY created DESC LIMIT ?, ?";  // '?' acts as placeholder. First question mark is the OFFSET, second is the LIMIT

        //create a prepared statement
        $stmt = mysqli_stmt_init($this->conn);
        // We create prepared statements when we need to take input from a user. If input is hardcoded (such as the count func below), we do not need it.


        // preparing the prepared statement
        if (!mysqli_stmt_prepare($stmt, $query)) {

            echo "There has been an error with prepare()";

        } else {

            // bind parameters to the '?' placeholder
            mysqli_stmt_bind_param($stmt, 'ii', $from_record_num, $records_per_page);  // ESSENTIAL that these are in the correct order

            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);  // mysqli way


            while ($array = mysqli_fetch_assoc($result)) {  // While loop continues until there are no more rows (this is the stopping condition)
                $row[] = $array;               
            }
        }
        return $row;

    }

    //used for paging products
    public function count() {

    // query to count all product records
    $query = "SELECT id FROM " . $this->table_name . "";
     
    $result = mysqli_query($this->conn,$query);

    $rows = $result->num_rows;

    return $rows;
    
}

// read all product based on product ids included in the $ids variable
// reference http://stackoverflow.com/a/10722827/827418
public function readByIds($ids){
 
    $ids_arr = str_repeat('?,', count($ids) - 1) . '?';
 
    // query to select products
    $query = "SELECT id, name, price FROM " . $this->table_name . " WHERE id IN ({$ids_arr}) ORDER BY name";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute($ids);
 
    // return values from database
    return $stmt;
}

// used when filling up the update product form
function readOne() {
 
    // query to select single record
    $query = "SELECT
                name, description, price
            FROM
                " . $this->table_name . "
            WHERE
                id = ?
            LIMIT
                0,1";

    $stmt = mysqli_stmt_init($this->conn);
 
    // prepare query statement
    if (!mysqli_stmt_prepare($stmt, $query)) {

        echo "Prepare from readOne() failed";

    } else {

        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
     
        // bind product id value
        mysqli_stmt_bind_param($stmt, 'i', $this->id);
     
        // execute query
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
     
        // get row values
        $row = mysqli_fetch_assoc($result);
     
        // assign retrieved row value to object properties
        $this->name = $row['name'];
        $this->description = $row['description'];
        $this->price = $row['price'];

    }
 
}
}