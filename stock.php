
<?php

@include 'config.php';
session_start();
$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header('location:login.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <title>Current Stock</title>
   <style>
      table {
         border-collapse: collapse;
         width: 100%;
      }
      th, td {
         border: 1px solid #ccc;
         padding: 8px;
         text-align: left;
         font-size: 15px;
      }
      th {
         background-color: #f2f2f2;
      }
   </style>

</head>
<body>
   
<?php include 'admin_header.php'; ?>


<?php
    // Include your database configuration

   $show_stock = $conn->prepare("SELECT id, name, quantity, price FROM `products`");
   $show_stock->execute();
?>

<h1>Current Stock</h1>

<table>
   <thead>
      <tr>
         <th>ID</th>
         <th>Name</th>
         <th>Quantity</th>
         <th>Price</th>
      </tr>
   </thead>
   <tbody>
      <?php while ($productItem = $show_stock->fetch(PDO::FETCH_ASSOC)): ?>
         <tr>
            <td><?= $productItem['id']; ?></td>
            <td><?= $productItem['name']; ?></td>
            <td><?= $productItem['quantity']; ?></td>
            <td>Rs <?= $productItem['price']; ?> /-</td>
         </tr>
      <?php endwhile; ?>
   </tbody>
</table>








<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
