<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="about">

   <div class="row">

      <div class="box">
         <img src="images/about-img-1.png" alt="">
         <h3>why choose us?</h3>
         <p>Choose us for your grocery shopping needs and experience the perect blend of quality,convenience,and exceptional service. Our website is dedicated to offering you the freshest and finest products sourced from trusted suppliers, with a user friendly interface, effortless navigation, and various delivery options, we priorize your convienience. Our friendly and knowledgeable staff are always ready to assist you, ensuring a satisfying shopping experience.Plus we offer competetive prices without compromising on quality, making us your go-to destination for affordable and exceptional groceries.</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

      <div class="box">
         <img src="images/about-img-2.png" alt="">
         <h3>what we provide?</h3>
         <p>At our grocery store website, we provide a comprehensive range of products and services to cater to all your grocery needs. we offer a wide selection of fresh produce, dairy products, meats,beverages,sea foods and much more. Our website is designed to make your shopping experience hassle-free,with easy to use search option, personalized recommendations, seamless checkut process. whether you're looking for organic, gluten free, or speciality items, we have you covered. With our commitment to quality,affordability and exceptional customer service, we are your one-stop shop for all your grocery essentials.</p>
         <a href="shop.php" class="btn">our shop</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">clients reivews</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/pic-1.png" alt="">
         <p>I'm impressed with thw wide range of products available on this grocery store website. From everyday essentials to speciality items, they have it all. The website is easy to navigate and I can quickly find what I need. Plus the prices are reasonable.It's definitely my prefered online grocery shopping destination.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>john deo</h3>
      </div>

      <div class="box">
         <img src="images/pic-2.png" alt="">
         <p>I absolutely love shopping on this website! The variety of products is amazing and everything arrives fresh and well-packaged.The ordering process is seamless,and the delivery is always on time.Highly recommende!.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Sarah M</h3>
      </div>

      <div class="box">
         <img src="images/pic-3.png" alt="">
         <p>Shopping for groceries has never been easier thanks to this website.I appreciate the user-friendly interface and the convenient search options.I highly recommen trying it out!.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Emily P</h3>
      </div>

      <div class="box">
         <img src="images/pic-4.png" alt="">
         <p>I recently started using this grocery store website, and I'm impressed by the overall experience.The website is fast and responsive, and the  search feature makes it a breeze to find specific items.I'm happy to have found this website for my grocery needs!.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Lisa T</h3>
      </div>

      <div class="box">
         <img src="images/pic-5.png" alt="">
         <p>I'm extremely satisfied with my experience shopping on this grocery store website. The selection of products is fantastic and I can find everything I need in one place. The website is easy to navigate, and the checkout process is seanless.Highly Recommend!.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>jennifier W.</h3>
      </div>

      <div class="box">
         <img src="images/pic-6.png" alt="">
         <p>I've been using this grocery store website for a while now, and I'm impressed with the overall experience.The websitehas become my preferred way to shop for groceries.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Mark M</h3>
      </div>

   </div>

</section>









<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>