<?php
// Connects to the database
include_once("db_setup.php");

// Checks if the user is logged in
session_start();
if (!isset($_SESSION['username'])) {
  // Redirects user to login page
  header("Location: login.php");
  exit;
} else {
  // Checks if the form is submitted
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Saves form data into variables
    $orderNumber = $_POST['order_number'];
    $orderStatus = $_POST['order_status'];
    $orderPrice = $_POST['order_price'];
    $userOrdered = $_SESSION['username'];

    // If there is any item in the cart
    if ($orderPrice) {
      // SQL execution
      $sql = "INSERT INTO orders VALUES (NULL, '$userOrdered', '$orderNumber', '$orderStatus', '$orderPrice')";
      $result = mysqli_query($conn, $sql);

      // Prints submit confirmation
      echo "<!DOCTYPE html>
      <html lang='en'>
      
      <head>
        <meta charset='UTF-8' />
        <meta name='viewport' content='width=device-width, initial-scale=1.0' />
        <!-- Font Awesome Import -->
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'
          integrity='sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=='
          crossorigin='anonymous' referrerpolicy='no-referrer' />
        <!-- Bootstrap CSS import -->
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'
          integrity='sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN' crossorigin='anonymous' />
        <!-- Bootstrap JS import -->
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js'
          integrity='sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL'
          crossorigin='anonymous'></script>
        <!-- Custom CSS import -->
        <link rel='stylesheet' href='./css/styles.css' />
        <!-- Title and Icon -->
        <link rel='icon' href='./assets/favicon.svg' />
        <title>iWave | Order sent</title>
      </head>
      
      <body>
        <!-- Navbar -->
        <nav class='navbar navbar-expand-lg bg-white'>
          <div class='container pt-2'>
            <a class='navbar-brand' href='index.html'><img src='./assets/logo.png' alt='logo' class='w-75' /></a>
            <button class='navbar-toggler' type='button' data-bs-toggle='offcanvas' data-bs-target='#nav'>
              <i class='navbar-toggler-icon'></i>
            </button>
      
            <div class='offcanvas offcanvas-end' id='nav'>
              <div class='offcanvas-header justify-content-end'>
                <button type='button' class='btn-close' data-bs-dismiss='offcanvas'></button>
              </div>
              <div class='offcanvas-body'>
                <ul class='navbar-nav d-lg-flex justify-content-lg-end w-100 me-auto mb-2 mb-lg-0 align-items-center'>
                  <li class='nav-item nav-item-mobile-margin mx-lg-4'>
                    <a class='navlink' href='index.html'>Home</a>
                  </li>
                  <li class='nav-item nav-item-mobile-margin mx-lg-4'>
                    <a class='navlink' href='products.php'>Products</a>
                  </li>
                  <li class='nav-item nav-item-mobile-margin mx-lg-4'>
                    <a class='navlink' href='contact.php'>Contact</a>
                  </li>
                  <li class='nav-item nav-item-mobile-margin mx-lg-4'>
                    <a class='navlinkicon' href='user.php'><i class='fa-regular fa-circle-user navlink-icon'></i></a>
                    <a class='navlinkicon' href='cart.php'><i class='fa-solid fa-cart-shopping navlink-icon'></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
        <!-- Main section -->
        <section class='container d-lg-block d-sm-flex flex-sm-column align-items-center-exsm align-items-sm-center'>
          <h2 class='heading-2 mb-1'>Your order no. $orderNumber has been sent.</h2>
          <p class='mt-0 text-sm-center text-lg-start'>Your order has been sent. You can see more informations in your profile
            page.</p>
          <a href='user.php' class='button mt-5'>Open user page</a>
        </section>
      </body>
      
      </html>";
    } else {
      // Redirects user to the cart page
      header("Location: cart.php");
    }

  }
}
?>


<script src="./js/checkout.js"></script>
<!-- Submit form -->
<form action='checkout.php' method='post' id='checkout-form'>
  <input type='hidden' name='order_number' id='checkout-order-number-input'>
  <input type='hidden' name='order_status' id='checkout-order-status-input'>
  <input type='hidden' name='order_price' id='checkout-order-price-input'>
  <input type='submit' style='display:none'>
</form>