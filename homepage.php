<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Your space</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/font-awesome.min.css"/>
  <link rel="stylesheet" href="css/animate.css"/>
  <link rel="stylesheet" href="css/owl.carousel.css"/>
  <link rel="stylesheet" href="css/style.css"/>

<style type="text/css">
  .your-space {
  margin-right: 9rem;
}
.box{
   background: url(images/BW.jpeg);
   height: 500px;
   width: 100%;
   background-repeat: no-repeat;
   margin:left :120px;


}
.navigation-buttons {
  margin-right: 10rem;
}



.review-section {
  text-align: center;
}

.thumbnail {
  width: 150px;
  height: 150px;

}

.reviews {
  color: #394867;
}

.card {
  width: 18rem;
  margin: 1rem 3rem;
  padding: 15px;
}

.card-img-top {
  height: 10rem;
  width: 10rem;
}

.B-text {
  padding-top: 7rem;
  color: #394867;
}

.images {
  width: 85%;
  height: 85%;
}

.footer-text {
  color: #9ba4b4;
  margin-top: 3rem;
  margin-bottom: 3rem;
  text-align: center;
}

</style>
</head>

<body>

  <!-- navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand your-space">Y O U R   S P A C E</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link navigation-buttons" href="#">Logout</a>
          <!-- <a class="nav-link navigation-buttons" href="#">Sign up</a> -->
          <a class="nav-link navigation-buttons" href="addproperty.php">Add property</a>
        </div>
      </div>
    </div>
  </nav>


 
<div class="box" class="center">

</div>
  <br>
  <br>
  <br>
  <?php 

  include('connection.php');
  $loc=$c='';
  $x1="select distinct location from house";
  $x2="select distinct city from house";
  $q="select * from cardrent order by time desc";
  if(isset($_POST['loc']) && isset($_POST['city']))
  {
    $loc=$_POST['loc'];
    $c=$_POST['city'];
    if($loc=='All' && $c=='All')
    {
      $q="select * from cardrent order by time desc";
    }
    if($loc=='All' && $c!='All')
    {
      $q="select * from cardrent where city='$c' order by time desc";
    }
    if($loc!='All')
    {
      $x2="select city from house where location='$loc'";
      $q="select * from cardrent where location='$loc' order by time desc";
    }
  }
  $r1=$conn->query($x1);
  $r2=$conn->query($x2);
  ?>






  <div class="filter-search">
    <div class="container">
      <form class="filter-form" method="post" action="homepage.php">
      <h2>Search by Location</h2>
        <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Location  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;City</h4>
        <select name="loc">
          <option value="All" selected>All</option>
          <?php 
          while($p1=mysqli_fetch_array($r1, MYSQLI_ASSOC))
          {
            echo "<option value='".$p1['location']."'>".$p1['location']."</option>";
          }
          ?>
        </select>
        <select name="city">
          <option value="All" selected>All</option>
          <?php 
          while($p2=mysqli_fetch_array($r2, MYSQLI_ASSOC))
          {
            echo "<option value='".$p2['city']."'>".$p2['city']."</option>";
          }
          ?>
        </select>
        <button class="site-btn fs-submit" type="submit">SEARCH</button>
      </form>
    </div>
  </div>


<section class="page-section categories-page">
    <br><br>
    <h2 align="center">All Properties</h2>
    <br><br>
    <div class="container">
      <div class="row">
        <?php

            $r = $conn->query($q);
            while($x=mysqli_fetch_array($r, MYSQLI_ASSOC))
            {
              ?>
              <div class='col-md-4' style="height:300px;">
                <form action='single_properties.php?action=add&id=<?php echo $x['house_id']; ?>' method="post">
                <div class='rent-notic'>FOR Rent</div>
                  <div class='propertie-info text-white' style="background-image:url('<?php echo $x['image'] ?>');height:270px">
                  <div class='info-warp'>
                    <p><i class='fa fa-map-marker'></i><?php echo $x['location'] ?></p>
                  </div>
                  <button class='price' type='submit'><?php echo "Rs. ".$x['rent amount']."/month" ?></button>
                  </div>
                  </form>
              </div>
        <?php
          }
        ?>
</div>
</div>
 








  <h2 align="center">Your Properties</h2>
    <br><br>
    <div class="container">
    <div class="row">
        <?php

            $ab="select * from house natural join rent where user_id='".session_id()."'";
            $r1 = $conn->query($ab);
            while($y=mysqli_fetch_array($r1, MYSQLI_ASSOC))
            {
              ?>
              <div class='col-md-4' style="height:300px;">
                <form action='single-list_rent.php?action=add&id=<?php echo $y['house_id']; ?>' method="post">
                <div class='rent-notic'></div>
                  <div class='propertie-info text-white' style="background-image:url('<?php echo $y['image1'] ?>');height:270px">
                  <div class='info-warp'>
                    <p><i class='fa fa-map-marker'></i><?php echo $y['location'] ?></p>
                  </div>
                  <button class='price' type='submit'><?php echo "Rs. ".$y['rent amount']."/month" ?></button>
                  </div>
                  </form>
              </div>
        <?php
      }
          ?>
</div>
</div>
</section>




 <!-- locations available -->
<!-- <br>
<h2 class="reviews"><p>Locations available:</p></h2>
<h3 class="reviews"><p>
  Take a look, you'll love 'em
</p></h3>
    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="B-text">Bangalore</h2>
      </div>
      <div class="col-md-5">
        <br><br>
        <img class="images" src="Home Rental Management System/images/Bangalore.jpg" alt="Bangalore-image">

      </div>
    </div>
<br>
<br><hr>
 -->


    <!--<div class="row featurette">
       <div class="col-md-7 order-md-2">
        <h2 class="B-text">New Delhi</h2>
      </div>
      <div class="col-md-5 order-md-1">
        <br><br>
        <img class="images" src="New Delhi.jpg" alt="NewDelhi-image">
      </div>
    </div>
<br><br><hr> -->







 <!-- reviews section -->
 <!--  <div class="container review-section">

    <div class="row ">
      <div class="col-lg-4">
        <img class="thumbnail rounded-circle" src="Home Rental Management System/images/Indian-woman.jpg" alt="Indian woman">
        <p class="reviews">
        <h5><em>Pallavi, Bengaluru</em></h5>
        </p>
        <p class="reviews">"Great location, alot of open space, everything available nearby and they allow pets too! What more do you want!"</p>
      </div>

      <div class="col-lg-4">
        <img class="thumbnail rounded-circle" src="Home Rental Management System/images/Indian-woman2.jpg" alt="Indian woman">
        <p class="reviews">
        <h5><em>Rukmani, Bengaluru</em></h5>
        </p>
        <p class="reviews">"Excellent services, property is well maintained, fast response, shortest time to conclude tenant agreement, professional and fair treatment of customers."</p>
      </div>

      <div class="col-lg-4">
        <img class="thumbnail rounded-circle" src="Home Rental Management System/images/Indian-couple.jpg" alt="Indian couple">
        <p class="reviews">
        <h5><em>Ganesh, New Delhi</em></h5>
        </p>
        <p class="reviews">"The staff is amazingly professional and supportive. The quality of the services is extremely high, they managed to take care of my needs and fulfill all my requests very efficiently. I highly recommend Your Space."</p>
      </div>
    </div>
    <br>
    <br>
    <hr>
 -->








  <!-- footer -->
  <footer class="footer-text"> &copy; 2020 Your Space</footer>




</body>

</html>
