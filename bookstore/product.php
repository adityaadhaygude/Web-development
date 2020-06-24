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
        width: 320px;
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
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">BookStore</a>
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
              <span data-feather="home"></span>
              Products <span class="sr-only">(current)</span>
            </a>
          </li>
          
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

<?php  
     
    $query = "SELECT * FROM tbl_images WHERE quantity>0 ORDER BY id DESC"; 
    $result = mysqli_query($connection, $query);                  
    while($row = mysqli_fetch_array($result))  
    {  
      $id =$row[0];
      $image =$row[1];
      $title =$row[2];
      $author=$row[3];
      $avail =$row[5];
      $price =$row[4];
      
        echo '<div class="card"><img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" class="img-thumnail" /><br><br>Title : '.$title.'<br>Author : '.$author.'<br>Price : '.$price.'<br>Quantity : '.$avail.'<br><form method="post" action="buynow.php?id="'.$row['id'].'><input type="text" name="id" value="'.$row['id'].'" hidden><input type="submit" value="Buy now" class="btn btn-success"></form></div>';  
     
      }

?>  
<style type="text/css">
  .options{
    height: 50px;
    width: 96%;
    margin: 2%;
    display: inline-block;
    float: left;
  }
  #id{
    display: none;
  }
  
</style>

<?php
  include 'include/footer.php';
?>