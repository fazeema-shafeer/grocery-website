<?php
$conn = mysqli_connect('localhost', 'root', '', 'shop_db');

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
    exit; // Terminate script execution after redirect
}

if (isset($_POST['order'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $address = 'house no. '. $_POST['house'] .' '. $_POST['street'] .' '. $_POST['city'] .' '. $_POST['district'] ;
    $placed_on = date('d-M-Y');

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'");
    echo mysqli_num_rows($cart_query);
    
    while ($rows = $cart_query->fetch_assoc()) {
        $product = $rows['name'];
        $price = $rows['price'];
        $qty = $rows['quantity'];
        $tot = $qty * $price;
        
        $product_id = $rows['pid'];
        
        

        // Insert order into orders table
        $insert = mysqli_query($conn, "INSERT INTO orders (user_id, total_products, quantity, total_price,name,placed_on,number,address,method,email) VALUES ('$user_id', '$product', '$qty', '$tot','$name','$placed_on','$number','$address','$method','$email')");
        
        if ($insert) {
            // Remove the bought item from the cart
             mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$user_id' AND pid = '$product_id'");

            // // Decrease the product's quantity in the products table
             mysqli_query($conn, "UPDATE products SET quantity = quantity - '$qty' WHERE id = '$product_id'");

            
        } else {
            echo "<script>alert('Order insertion failed.');</script>";
        }
    }

   
    echo "<script>window.location = 'orders.php';</script>"; // Redirect to orders page
}
?>

