<?php

@include 'config.php';
// $conn = mysqli_connect('localhost','root','','shop_db');
// $sql=mysqli_query($conn,"select * from products");
// $product=mysqli_fetch_array($sql);

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};


if (isset($_POST['update_product'])) {

   $update_id = $_POST['update_id'];
   $quantity = $_POST['quantity'];
   $new_price = $_POST['new_price'];

   // Validate and sanitize input values if necessary

   $update_product = $conn->prepare("UPDATE `products` SET quantity = ?, price = ? WHERE id = ?");
   if ($update_product->execute([$quantity, $new_price, $update_id])) {
      // Product updated successfully
      $message = "Product updated successfully.";
   } else {
      // Update failed
      $message = "Failed to update product.";
   }
}

if(isset($_POST['add_product'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $category = $_POST['category'];
   $category = filter_var($category, FILTER_SANITIZE_STRING);
   $details = $_POST['details'];
   $details = filter_var($details, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select_products = $conn->prepare("SELECT * FROM `products` WHERE name = ?");
   $select_products->execute([$name]);

   if($select_products->rowCount() > 0){
      $message[] = 'product name already exist!';
   }else{

      $insert_products = $conn->prepare("INSERT INTO `products`(name, category, details, price, image) VALUES(?,?,?,?,?)");
      $insert_products->execute([$name, $category, $details, $price, $image]);

      if($insert_products){
         if($image_size > 2000000){
            $message[] = 'image size is too large!';
         }else{
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'new product added!';
         }

      }

   }

};

if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $select_delete_image = $conn->prepare("SELECT image FROM `products` WHERE id = ?");
   $select_delete_image->execute([$delete_id]);
   $fetch_delete_image = $select_delete_image->fetch(PDO::FETCH_ASSOC);
   unlink('uploaded_img/'.$fetch_delete_image['image']);
   $delete_products = $conn->prepare("DELETE FROM `products` WHERE id = ?");
   $delete_products->execute([$delete_id]);
   $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE pid = ?");
   $delete_wishlist->execute([$delete_id]);
   $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE pid = ?");
   $delete_cart->execute([$delete_id]);
   header('location:admin_products.php');


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>


<section class="add-products">

   <h1 class="title">add new product</h1>

   <form action="" method="POST" enctype="multipart/form-data">
      
         <div class="inputBox">
         <input type="text" name="name" class="box" required placeholder="enter product name">
         <select name="category" class="box" required>
            <option value="" selected disabled>select category</option>
            <option value="vegetables">vegetables</option>
               <option value="fruits">fruits</option>
               <option value="meat">meat</option>
               <option value="sea food">sea food</option>
               <option value="Baby Products">Baby Products</option>
               <option value="Dairy Products">Dairy Products</option>
               <option value="Beverages">Beverages</option>
               <option value="House hold">House hold</option>
               <option value="Cooking Essentials">Cooking Essentials</option>
               <option value="Bakery">Bakery</option>
               <option value="Frozen Food">Frozen Food</option>
         </select>
         </div>
         <div class="inputBox">
         <input type="number" min="0" name="price" class="box" required placeholder="enter product price">
         <input type="file" name="image" required class="box" accept="image/jpg, image/jpeg, image/png">
         </div>
         </div>
      <textarea name="details" class="box" required placeholder="enter product details" cols="30" rows="10"></textarea>
      <input type="submit" class="btn" value="add product" name="add_product">
   </form>

</section>
<section class="add-products">

   <h1 class="title">Update Product</h1>

   <form action="" method="POST" enctype="multipart/form-data">
      
         <div class="inputBox">
         <label for="update_id"></label></label>
         <select name="update_id" class="box" required>
            <option value="" selected disabled>Select a product to update</option>
            <?php
            $show_products = $conn->prepare("SELECT id, name FROM `products`");
            $show_products->execute();
            while ($productItem = $show_products->fetch(PDO::FETCH_ASSOC)):
            ?>
               <option value="<?= $productItem['id']; ?>"><?= $productItem['name']; ?></option>
            <?php endwhile; ?>
         </select>
         </div>
         <div class="inputBox">
         <input type="number" name="quantity" class="box" required placeholder="Enter quantity of the product">
         </div>
         <div class="inputBox">
         <input type="number" min="0" name="new_price" class="box" required placeholder="Enter new product price">
         </div>
      <input type="submit" class="btn" value="Update Product" name="update_product">
   </form>

</section>



<section class="show-products">

   <h1 class="title">products added</h1>

   <div class="box-container">

   <?php
      $show_products = $conn->prepare("SELECT * FROM `products`");
      $show_products->execute();
      if($show_products->rowCount() > 0){
         while($fetch_products = $show_products->fetch(PDO::FETCH_ASSOC)){  
   ?>
   <div class="box">
      <div class="price">Rs<?= $fetch_products['price']; ?>/-</div>
      <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
      <div class="name"><?= $fetch_products['name']; ?></div>
      <div class="cat"><?= $fetch_products['category']; ?></div>
      <div class="details"><?= $fetch_products['details']; ?></div>
      <div class="flex-btn">
         <a href="admin_update_product.php?update=<?= $fetch_products['id']; ?>" class="option-btn">update</a>
         <a href="admin_products.php?delete=<?= $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
   </div>
   <?php
      }
   }else{
      echo '<p class="empty">now products added yet!</p>';
   }
   ?>

   </div>

</section>

<script src="js/script.js"></script>

</body>
</html>
