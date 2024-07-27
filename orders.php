<?php
@include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'header.php'; ?>

<section class="placed-orders">

   <h1 class="title">placed orders</h1>

   <div class="box-container">

   <?php
      $select_orders = $conn->prepare("SELECT DISTINCT placed_on, name, number, email, address, method,  payment_status FROM `orders` WHERE user_id = ? AND payment_status = 'pending'");
      $select_orders->execute([$user_id]);
      if ($select_orders->rowCount() > 0) {
         while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
   ?>
   <div class="box">
      <p> placed on : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
      <p> name : <span><?php echo $fetch_orders['name']; ?></span> </p>
      <p> number : <span><?php echo $fetch_orders['number']; ?></span> </p>
      <p> email : <span><?php echo $fetch_orders['email']; ?></span> </p>
      <p> address : <span><?php echo $fetch_orders['address']; ?></span> </p>
      <p> payment method : <span><?php echo $fetch_orders['method']; ?></span> </p>
      
      <p> payment status : <span style="color:<?php echo ($fetch_orders['payment_status'] == 'pending') ? 'red' : 'green'; ?>"><?php echo $fetch_orders['payment_status']; ?></span> </p>
      
      <p>Your Orders:</p>
      <?php
         $select_order_details = $conn->prepare("SELECT total_products, quantity,total_price FROM `orders` WHERE user_id = ? AND placed_on = ?");
         $select_order_details->execute([$user_id, $fetch_orders['placed_on']]);
         $total_order_amount=0;
         while ($fetch_order_details = $select_order_details->fetch(PDO::FETCH_ASSOC)) {
            echo '<p>'.$fetch_order_details['total_products'].' - '.$fetch_order_details['quantity'].' pcs'.' - '.$fetch_order_details['total_price'].'</p>';
            @$total_order_amount += $fetch_order_details['total_price'];
         }
        echo" <p> total price : .$total_order_amount./-</span> </p> ";
      ?>
   </div>
   <?php
         }
      } else {
         echo '<p class="empty">no pending orders placed yet!</p>';
      }
   ?>

   </div>

</section>

<?php include 'footer.php'; ?>

</body>
</html>
