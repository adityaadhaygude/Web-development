<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bookstore</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
    <!-- Bootstrap core CSS -->
  <link href="css/sty.css" rel="stylesheet">
  <link rel="icon" href="img/lib.jpg">
  <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
  <meta name="theme-color" content="#563d7c">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      .loginname{
        color: white;
      }
      .welcome{
        color: white;

      }
       .card-img-top{
        height: 300px;
        width: 100%;
      }
      .card{
        height: 500px;
        padding: 0.7%;
        width: 30%;
        margin:1%;
        display: inline-block;
        justify-content: center;
        align-items: left;
        
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/admin.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="product.php">BookStore</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
     <span class="welcome">Welcome:<?php include 'include/usersession.php';echo $login_session;?></span>
      <a href="home.php">
      <button class="btn btn-danger">Logout</button>
      </a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="shopping-cart"></span>
              Buy now <span class="sr-only">(current)</span>
            </a>
          </li>
          
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <?php
        $stdid=$_POST['id'];
       // echo $stdid;
      
        
      if (isset($_POST['submit'])) 
      {
        $sid=$_POST['id'];

        $query="SELECT title,price FROM tbl_images WHERE id='$sid'";
        $result = mysqli_query($connection, $query); 
        while($row = mysqli_fetch_array($result))  
         {  
            $bookname =$row[0];   
            $price= $row[1]; 
          }             

        $name=$_POST['name'];
        $address=$_POST['address'];
        $email=$_POST['email'];
        $contact=$_POST['contact'];
        $quantity=$_POST['quantity'];
        $totalprice=$quantity*$price;

         $query1="INSERT INTO orders(username,bookname,quantity,totalprice,address,email,contact) VALUES('$login_session','$bookname','$quantity',$totalprice','$address','$email','$contact')";
         $result = mysqli_query($connection, $query1); 
         if ($result) {
          $query2="UPDATE tbl_images SET quantity=quantity-'$quantity' WHERE id='$sid'";
          mysqli_query($connection, $query2);

           echo "<script>alert('Order placed successfully!')</script>";
           header('location:product.php');
           exit();
         }
       
       }
      ?>
      <div id="Buy">
            <h2>Place an order</h2>
            <form action="" method="post">
              <label>Id :</label>
              <input  name="id" value="<?php echo $stdid;?>"" type="text" >
              <label>Name :</label>
              <input  name="name" placeholder="name" type="text" required>
              <label>Address :</label>
              <input  name="address" placeholder="address" type="text" required>
              <label>Email :</label>
              <input  name="email" placeholder="email" type="text" required>
              <label>Contact :</label>
              <input  name="contact" placeholder="contact" type="text" required>
              <label>Quantity :</label>
              <input name="quantity" placeholder="quantity" type="text" required>

              <input name="submit" type="submit" value=" Place an order " class="btn btn-primary">
              
              
            </form>
          
  
</style>

<?php
  include 'include/footer.php';
?>