<?php
  include 'include/header.php';
?>
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addbook.php">
              <span data-feather="upload"></span>
              Add book
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="users.php">
              <span data-feather="users"></span>
              Users
            </a>
          </li>
         <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="shopping-cart"></span>
              Orders
            </a>
          </li>
          
        </ul>
         </div>
    </nav>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div>
    <?php  
     
    $query = "SELECT * FROM orders"; 
    $result = mysqli_query($connection, $query);        
    echo '<div class="tab"><table class="table table-striped"><tr><td id="brow">Id</td><td id="brow">Username</td><td id="brow">Bookname</td><td id="brow">Quantity</td><td id="brow">Total price</td><td id="brow">Address</td><td id="brow">Email</td><td id="brow">Contact</td></tr>';          
    while($row = mysqli_fetch_array($result))  
    {  
      $id =$row[0];
      $username =$row[1];
      $bookname=$row[2];
      $quantity=$row[3];
      $totalprice=$row[4];
      $address=$row[5];
      $email=$row[6];
      $contact=$row[7];
    
        echo '<tr><td>'.$id.'</td><td>'.$username.'</td><td>'.$bookname.'</td><td>'.$quantity.'</td><td>'.$totalprice.'</td><td>'.$address.'</td><td>'.$email.'</td><td>'.$contact.'</td></tr>';  
     }
    //$_SESSION['image']=$image;
    echo '</table></div>';
?> 
<?php
  include 'include/footer.php';
?>
<style type="text/css">
 
  #brow{
    font-weight: bold;
  }
  .tab{
    margin-top: 2%;
    
  }
</style>