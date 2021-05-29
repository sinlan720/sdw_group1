<?php
session_start();
    // $_SESSION = [];

require_once '../../BusinessServiceLayer/controller/goodController.php';
require_once '../../BusinessServiceLayer/controller/cartController.php';
$good = new goodController();
$cart = new cartController();
$data = $good->viewAll(); 
$view_variable = 'a string here';

  if (!isset($_SESSION['username'])) {
    $message = "You must log in first";
        header('refresh:5; url=../../ApplicationLayer/ManageLoginInterface/login.php');
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../view';</script>";
  }

  if (isset($_POST ['delete'])) {
    $good->delete();
  }

  if(isset($_POST['buy'])){
    $cart->add();
    // console_log($view_variable);


    // $sql = "insert into cart(good_name, good_quantity, good_price, good_image) select good_name, good_quantity, good_price from good where good_id = 6";
    //     // $args = [':name'=>$this->name, ':quantity'=>$this->quantity, ':price'=>$this->price];
    //     DB::run($sql,$args);
}

?>

<?php


if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `good` WHERE good_name LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `good`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "sdw");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<?php include"../../includes/head.php";?>

<style>

th {
  font-size: 17px;
  font-weight: bold;
  color:Black;"
}
p1 {
  font-size: 19px;
  font-weight: bold;
  color:Black;"
}

p2 {
  font-size: 14px;
  font-weight: bold;
  color:Black;"
}


p3 {
  border-style: solid;
  border-color: grey;
}

</style>
<body>


 
                            
<body>



<div class="wrapper" id="wrapper">
        
       
  <div class="wrapper" id="wrapper">
    <?php 
    include "../../includes/header.php";
    ?>

<div style="background-image: url('../../images/goodList.jpg');">
    <div class="ht__bradcaump__wrap d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="bradcaump__inner text-center">
              <h2 class="bradcaump-title">Good Searching</h2>
              <nav class="bradcaump-inner">
                <a class="breadcrumb-item" href="../../ApplicationLayer/ManageGoodInterface/goodList.php">Good List</a>
                <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                <span class="breadcrumb-item active">Good Searching</span>
              </nav>  
                </div>
          </div>
        </div>
      </div>
    </div>

    

  </div>
<section class="type__category__area bg--white section-padding">

   <div style="background-image: url('../../images/goodMenu.jpg');">
   
  <div class="wrapper wrapper--w790">
    <div class="card card-5">
      <div class="card-heading">
        <h2 class="title">Good Searching</h2>
      </div>
      <div class="card-body">
      
  <center>
    <!-- <div class="content_resize2"> -->
      <!-- <center> -->
      <table>
            <thead>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th></th>
      
            <th>  Action</th>
            </thead>
           
           
      
            <form action="search.php" method="post">
           <p3> <input type="text"  name="valueToSearch" placeholder="Search Good Name"></p3><br><br>
            <input type="submit" button class="btn btn--radius-2 btn--red" name="search" value="Search"><br></br>

            

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):
                     $image =  $row['good_image'];
                     $isrc = "../../images/";
                
                     echo "<tr>"
                     . "<td><p2>".$row['good_name']."</font>"."</p2></td>"
                     . "<td><img src=\"" .$isrc. $row['good_image'] . "\" height=\"130\" width=\"150\"> </td>"
                     ."<td><p1>RM".$row['good_price']."</p1></td>";
                    ?>
                    <td></td>
            <td><form action="" method="POST">
              <?php
              if ($_SESSION['usergroup'] == 1) {
                  ?>
               <button class="btn btn--radius-2 btn--red" input type="button" name="view" value="View" onclick="location.href='../../ApplicationLayer/ManageGoodInterface/view.php?good_id=<?=$row['good_id']?>'">View</button>
               <br></br>
              <input type="hidden" name="name" value="<?=$row['good_name']?>">
              <input type="hidden" name="price" value="<?=$row['good_price']?>">
              <input type="hidden" name="image" value="<?=$row['good_image']?>">
              <input type="hidden" name="quantity" value="1">
              <button class="btn btn--radius-2 btn--red" type="submit" name="buy" value="BUY">Buy</button>
               <br></br>
                </tr>
                <?php
            } elseif ($_SESSION['usergroup'] == 2){ ?>
              <button class="btn btn--radius-2 btn--red" input type="button" name="view" value="View" onclick="location.href='../../ApplicationLayer/ManageGoodInterface/view.php?good_id=<?=$row['good_id']?>'">View</button>
              <br></br>
              <button class="btn btn--radius-2 btn--red"input type="button" name = "edit" value="Edit" onclick="location.href='../../ApplicationLayer/ManageGoodInterface/edit.php?good_id=<?=$row['good_id']?>'">Edit</button>
                 <br></br>
              <input type="hidden" name="good_id" value="<?=$row['good_id']?>"><button class="btn btn--radius-2 btn--red"input type="submit" name="delete" value="Delete">Delete</button>
               <br></br>
              <?php
            }?>
                <?php endwhile;?>
                
            </table>
        </form>
        <br></br>
        <br></br>
        <button class="btn btn--radius-2 btn--red"> <a href="goodList.php">Back</a></button>
        </section>


<?php
include "../../includes/footer.php";
?>


</div><!-- //Main wrapper -->
<!-- JS Files -->
<script src="js/vendor/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/active.js"></script>


</body>
</html>

