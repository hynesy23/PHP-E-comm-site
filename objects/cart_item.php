<?php
// 'cart item' object
class CartItem {
 
    // database connection and table name
    private $conn;
    private $table_name = "cart_items";
 
    // object properties
    public $id;
    public $product_id;
    public $quantity;
    public $user_id;
    public $created;
    public $modified;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }

    // check if a item has been added to cart
    public function exists(){
 
    // query to count existing cart item
    $query = "SELECT count(*) FROM " . $this->table_name . " WHERE product_id= ? AND user_id= ?";
 
    $stmt = mysqli_stmt_init($this->conn);

    // prepare query statement
    //$stmt = $this->conn->prepare( $query );

    if (!mysqli_stmt_prepare($stmt, $query)) {

        echo "Prepare in cart_item failed";

    } else {

    // sanitize
    $this->product_id=htmlspecialchars(strip_tags($this->product_id));
    $this->user_id=htmlspecialchars(strip_tags($this->user_id));
 
    // bind category id variable
    mysqli_stmt_bind_param($stmt, 'ii', $this->product_id, $this->user_id);
   
    // execute query
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
 
    // get row value
    // $rows = $stmt->fetch(PDO::FETCH_NUM);
    $rows = mysqli_fetch_array($result);
 
    // return
    if ($rows[0] > 0) {
        
        return true;
    }

        return false;

    }

}

// count user's items in the cart
public function count() {
 
    // query to count existing cart item
    $query = "SELECT id FROM " . $this->table_name . " WHERE user_id = ?";
 
    $stmt = mysqli_stmt_init($this->conn);

    // prepare query statement
    if (!mysqli_stmt_prepare($stmt, $query)) {

        echo "cart_item prepare fail";

    } else {

        $this->user_id=htmlspecialchars(strip_tags($this->user_id));

        mysqli_stmt_bind_param($stmt, 'i', $this->user_id);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $row = $result->num_rows;

        return $row;
    }
}

// create cart item record
function create() {
 
    // to get times-tamp for 'created' field
    $this->created = date('Y-m-d H:i:s');
 
    // query to insert cart item record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                product_id = ?,
                quantity = ?,
                user_id = ?,
                created = ?";
 
    $stmt = mysqli_stmt_init($this->conn);

    // prepare query statement
    if (!mysqli_stmt_prepare($stmt, $query)) {

        echo "Prepare in cart_item failed";

    } else {

        echo "Prepare in cart_item success";

        // sanitize
        $this->product_id=htmlspecialchars(strip_tags($this->product_id));
        $this->quantity=htmlspecialchars(strip_tags($this->quantity));
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));

        // bind values
        mysqli_stmt_bind_param($stmt, 'iiii', $this->product_id, $this->quantity, $this->user_id, $this->created);
        
        // execute query
        if (mysqli_stmt_execute($stmt)) {

            echo "Execute success";

            return true;

        } else {

            echo "execute failure";

            return false;
        }
    }
 
  
}

// read items in the cart
public function read() {

    $array = array();
 
    $query = "SELECT p.id, p.name, p.price, ci.quantity, ci.quantity * p.price AS subtotal
            FROM " . $this->table_name . " ci
                LEFT JOIN products p
                    ON ci.product_id = p.id
            WHERE ci.user_id = ?";

    $stmt = mysqli_stmt_init($this->conn);
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);

    if (!mysqli_stmt_prepare($stmt, $query)) {

        echo "Failure in read from cart_item";

    } else {

        // sanitize
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));
     
        // bind value
        mysqli_stmt_bind_param($stmt, 'i', $this->user_id);
     
        // execute query
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {

            $array[] = $row;
        }

        return $array;
    }
 
}

// create cart item record
function update() {
 
    // query to insert cart item record
    $query = "UPDATE " . $this->table_name . "
            SET quantity = ?
            WHERE product_id = ? AND user_id = ?";

    $stmt = mysqli_stmt_init($this->conn);
 
    // prepare query statement
    if (!mysqli_stmt_prepare($stmt, $query)) {

        echo "Failed in update in cart_item";

    } else {

        // sanitize
        $this->quantity=htmlspecialchars(strip_tags($this->quantity));
        $this->product_id=htmlspecialchars(strip_tags($this->product_id));
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));

        mysqli_stmt_bind_param($stmt, 'iii', $this->quantity, $this->product_id, $this->user_id);

        if (mysqli_stmt_execute($stmt)) {

            return true;

        } else {

            return false;
        }

    }
}

// remove cart item by user and product
public function delete() {
    
    echo "Delete function";
    
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE product_id = ? AND user_id = ?";
    
    $stmt = mysqli_stmt_init($this->conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {

        echo "Prepare from delete failed";

    } else {

        // sanitize
        $this->product_id = htmlspecialchars(strip_tags($this->product_id));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
     
        // bind ids
        mysqli_stmt_bind_param($stmt, 'ii', $this->product_id, $this->user_id);

        if (mysqli_stmt_execute($stmt)) {

            echo "Deletion successful";

            return true;

        } else {

            echo "Deletion failed";

            return false;

        }
     
    }
}

// remove cart items by user
public function deleteByUser() {

    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE user_id = ?";

    $stmt = mysqli_stmt_init($this->conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {

        echo "Prepare in Delete all failed";

    } else {
        
        // sanitize
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));
     
        // bind id
        mysqli_stmt_bind_param($stmt, 'i', $this->user_id);
     
        if (mysqli_stmt_execute($stmt)) {

            return true;

        } else {

            return false;

        }     
    }
    } 

}