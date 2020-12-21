<!DOCTYPE html>

	<html lang="en" dir="ltr">
	<head>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/style.css"/>

	<link rel="stylesheet" href="images/top-bg.jpg">
<style type="text/css">

  .navigation-bar {
  margin-top: 0;
}


.heading {
  text-align: center;
  background: #fff;
  margin-bottom: 10rem;
  color: #383838;
}

.page-top-section {
  padding-top: 5rem;
  background-color: #c8c8c8;

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
.page-top-section set-bg{
	background-image: url(images/top-bg.);
}

#grey-colour {
  background-color: #383838;
}


.page-end {
  color: #bbbbbb;
  margin: 50px;
  text-align: center;
}

.box-shadow {
  box-shadow: 0px 2px 10px rgba(0,0,0,0.2);
}

</style>

<head>
  <meta charset="utf-8">
  <title>Property</title>

  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>


<body>

  <div class="heading">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark navigation-bar">
      <div class="container-fluid">
        <a class="navbar-brand">YOUR SPACE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="home.php">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="login.php"><?php session_start(); echo $_SESSION["username"]."  ";?><i class="fa fa-sign-in"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="page-top-section set-bg" data-setbg="images/top-bg.jpg">
		<div class="container text-black">
     <h1>Home sweet home!</h1>
    <h2>Your search for a dream home ends here!</h2>
	</div>
</div>

    <<!-- p class="heading-text">
    <h1>Home sweet home!</h1>
    <h2>Your search for a dream home ends here...</h2>
    </p>
  </div>
 -->

<!-- Page top section -->
	
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>
		</div>
	</div>



  <?php
include('connection.php');

$x=session_id();
$sql = "SELECT * FROM house natural join rent where house_id=$x";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$q='';$a;

  $a=1;
  $q="select name from user where user_id=".$row['uid']."";


$res=$conn->query($q);
$r= mysqli_fetch_assoc($res,MYSQLI_ASSOC);
$a="SELECT rent amount FROM rent where house_id=$x";
$r1 = $conn->query($a);
$r2 = mysqli_fetch_assoc($r1);
$_SESSION["amt"]=$r2['rent_amount'];
$b="SELECT name from user where user_id=(SELECT user_id from house where house_id=$x)";   

$r4=$conn->query($b);
$r5= mysqli_fetch_assoc($r4);
$_SESSION["buyer"]=$r5['name'];
$_SESSION["house_id"]=$x;
?>
	<!-- Page -->
	<section class="page-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 single-list-page">
					<div class="single-list-slider owl-carousel" id="sl-slider">
                        <div class="sl-item set-bg" data-setbg="<?php echo $row['image1'] ?>"></div>
                        <div class="sl-item set-bg" data-setbg="<?php echo $row['image2'] ?>"></div>
						
          </div>
          <div class="owl-carousel sl-thumb-slider" id="sl-slider-thumb">
						<div class="sl-thumb set-bg" data-setbg="<?php echo $row['image1'] ?>"></div>
						<div class="sl-thumb set-bg" data-setbg="<?php echo $row['image2'] ?>"></div>
						
					</div> 
          <div class="single-list-content">
						<div class="row">
							<div class="col-xl-8 sl-title">
								<h2><?php echo $row['location'] ?></h2>
								<p><i class="fa fa-map-marker"></i><?php echo $row['location'] ?></p>
							</div>
							<div class="col-xl-4">
								<a href="payment.php" class="price-btn"><?php echo  "Rent Amount: ".$row['rent_amount']."/-" ?></a>
							</div>
							<div class="col-xl-4">
								<button class="price-btn"><?php echo  "Deposit Amount: ".$row['deposit amount']."/-" ?></button>
                            </div>
                            <div class="col-xl-4">
								<button class="price-btn"><?php echo "Time Period: ".$row['time_period']." months" ?></button>
							</div>
						</div>
						<h3 class="sl-sp-title">Property Details</h3>
						<div class="row property-details-list">
							<div class="col-md-4 col-sm-6">
								<p><i class="fa fa-th-large"></i><?php echo $row['area']." sqft" ?></p>
								
							</div>
						</div>
						<h3 class="sl-sp-title">Description</h3>
						<div class="description">
							<p><?php echo $row['description'] ?></p>
							</div>
						<h3 class="sl-sp-title">Property Amenities</h3>
						<div class="row property-details-list">
							<div class="col-md-12 col-sm-6">
								<p><i class="fa fa-check-circle-o"></i><?php echo $row['amenities'] ?></p>
							</div>
						</div>
						
					</div>
			  </div>
</div>
</div>
</section>
        





          <?php
        	$x=$_GET["id"];
        	$sql1="SELECT * FROM house natural join rent where house_id=$x";
        	$result1 = $conn->query($sql1);
			$row1 = mysqli_fetch_assoc($result1);
			$b=0;$q1='';
			if($row1['bid']==NULL)
			{
				if($row1['uid']!=NULL)
				{
					$y=$row1['uid'];
				//echo "UID".$row1['uid'];
			//	echo $y;
				$b=1;
				//echo $b;
				}
			}
			if($row1['uid']==NULL)
			{
				if($row1['bid']!=NULL)
				{
					$y=$row1['bid'];
				//echo "BID".$row1['bid'];
				//echo $y;
				$b=2;
				//echo $b;
				}
			}
			
			
				$q1="select * from login where user_id=".$row1['uid']."";
				$_SESSION["save1"] =$row1['uid'] ;

			
		//	echo $q1;
			$res1=$conn->query($q1);
			$r1= mysqli_fetch_assoc($res1);
        	
        ?>

     

        <div class="col-lg-4 col-md-7 sidebar">
					<div class="author-card">
						<div class="author-img set-bg" data-setbg="img/author.jpg"></div>
						<div class="author-info">
							<h5><?php echo $r1['name']; ?></h5>
						</div>
						<div class="author-contact">
							<p><i class="fa fa-phone"></i><?php echo $r1['phone'];  ?></p>
							<p><i class="fa fa-envelope"></i><?php echo $r1['email']; ?></p>
						</div>
					</div>
					<div class="contact-form-card">
						<h5>Do you have any question?</h5>

						<form id="form" method="post">
							<input type="text" name="name" placeholder="Your name">
							<input type="text" name="email" placeholder="Your email">
							<textarea name="question"placeholder="Your question"></textarea>
							<button name="send">SEND</button>
						</form>

							<?php
    include('connection.php');
    if(isset($_POST['name']))
    {
   		$name=$_POST['name'];
    }
    if(isset($_POST['email']))
    {
    	$email=$_POST['email'];
    }
    if(isset($_POST['question']))
    {
    	$question=$_POST['question'];
    }
    $id='';
   
  
    	if(isset($_POST['send']))
    	{
    	 $q1="insert into feedback(val,name,email,question) values(".$_SESSION['id'].",'$name','$email','$question')";
    	}
        $result1 = $conn->query($q1);
   
?>
      </div>
		</div>
	</section>
	<!-- Page end -->


	<!-- Clients section -->
	<div class="clients-section">
		<div class="container">
			<div class="clients-slider owl-carousel">
				<a href="#">
					<img src="img/partner/1.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/2.png" alt="">
				</a>
			</div>
		</div>
	</div>
	<!-- Clients section end -->
</div>
</div>
</section>
</body>
</html>