<?php
    include('connection.php');
    session_start();
    $loc=$city=$desc=$am=$ar=$i1=$i2=$rent=$dep=$time='';
    $locErr=$cityErr=$descErr=$amErr=$arErr=$iErr=$rentErr=$depErr=$timeErr='';
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$b=true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["loc"])) {
        $locErr = "*Location is required";
        $b=false;
      } else {
        $loc = test_input($_POST["loc"]);
         if (!preg_match("/^[a-zA-Z_ ]*$/",$loc) || $loc=='') {
          $locErr = "*Only letters allowed";
          $b=false; 
        }
      }
      if (empty($_POST["city"])) {
        $cityErr = "*City is required";
        $b=false;
      } else {
        $city = test_input($_POST["city"]);
         if (!preg_match("/^[a-zA-Z]*$/",$city) || $city=='') {
          $cityErr = "*Only letters allowed";
          $b=false; 
        }
      }
      if (empty($_POST["desc"])) {
        $descErr = "*Description is required";
        $b=false;
      } else {
        $desc = test_input($_POST["desc"]);
      }
      if (empty($_POST["amen"])) {
        $amErr = "*Amenities is required";
        $b=false;
      } else {
        $am = test_input($_POST["amen"]);
      }
      if (empty($_POST["img1"])) {
        $iErr = "*Image is required";
        $b=false;
      } else {
        $i1= test_input($_POST["img1"]);
        $i2= test_input($_POST["img2"]);
        
      }
  if (empty($_POST["area"])) {
    $arErr = "*Area is required";
    $b=false;
  } else {
    $ar = test_input($_POST["area"]);
    if(!preg_match("/^[0-9]{2,10}$/",$ar) || $ar==''){
      $arErr = "*Enter only Numbers";
      $b=false;
    }
  }
  if (empty($_POST["rent"])) {
    $rentErr = "*Rent is required";
    $b=false;
  } else {
    $rent = test_input($_POST["rent"]);
    if(!preg_match("/^[0-9]{2,10}$/",$rent) || $rent==''){
      $rentErr = "*Enter only Numbers";
      $b=false;
    }
  }
  if (empty($_POST["dep"])) {
    $depErr = "*Deposit is required";
    $b=false;
  } else {
    $dep = test_input($_POST["dep"]);
    if(!preg_match("/^[0-9]{2,10}$/",$dep) || $dep==''){
      $depErr = "*Enter only Numbers";
      $b=false;
    }
  }
  if (empty($_POST["time"])) {
    $timeErr = "*Time is required";
    $b=false;
  } else {
    $time = test_input($_POST["time"]);
    if(!preg_match("/^[0-9]{1,3}$/",$time) || $time==''){
      $timeErr = "*Enter only Numbers";
      $b=false;
    }
  }
}
if($b==true && isset($_POST['submit']))
{
    $id='uid';
    $q1="insert into flat(location,$id,city,description,amenities,area,image1,image2) values('$loc',".$_SESSION['id'].",'$city','$desc','$am',$ar,'$i1','$i2')";
    echo $q1;
    $x=$conn->query($q1);
    $q4="select house_id from house where location='$loc' and city='$city' and area=$ar and amenities='$am'";
    $r4=$conn->query($q4);
    $y=mysqli_fetch_array($r4, MYSQLI_ASSOC);
    $test1=$y['house_id'];
    echo "flat id fetched is ".$test1;
    $q5="insert into rent(house_id,rent amount,deposit,time_period) values($test1,$rent,$dep,$time)";
    $result5 = $conn->query($q5);
    echo "Rent inserted";
    header('Location:home.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<style type="text/css">
  body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

}
.form-signin  {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 12px;

}
.form-signin .form-control:focus {
  z-index: 2;
}


.location {
  margin-bottom: -1px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;

}

.city {
  margin-bottom: -1px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  border-radius: 0;
}

.description {
  margin-bottom: -1px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  border-radius: 0;
}

.amenities {
  margin-bottom: -1px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  border-radius: 0;
}

.area {
  margin-bottom: -1px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  border-radius: 0;
}

.image {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.image {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.file-choosing {
  margin-top: 20px;
  margin-bottom: 40px;
}

</style>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.79.0">
  <title>Add Property</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <!-- Favicons -->
  <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#7952b3">


  <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=prb090LPy1h8s0AGVjEJF6JuN-9uMFeD3O6Bv6FHLfxTP5Oc0KuiV8Uypzp9H7BzyPq9MLIIVAZCZnuS7iuUrb3gEXYG4ldqVTFea_YjbIA"
    charset="UTF-8"></script>
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
 <!--  <link href="styles(2).css" rel="stylesheet"> -->
</head>

<body class="text-center">

  <main action="/" class="form-signin" method="POST" enctype="multipart/form-data">
    <form>
      <h1 class="h3 mb-3 fw-normal">Fill the details:</h1>
      <label for="inputName" class="visually-hidden">Loaction</label>
      <input type="text" class="form-control location " placeholder="Location" required autofocus>

      <label for="inputId" class="visually-hidden">City</label>
      <input type="text" class="form-control city" placeholder="City" required autofocus>

      <label for="inputAddress" class="visually-hidden">Description</label>
      <input type="text" class="form-control description" placeholder="Description" required>

      <label for="inputType" class="visually-hidden">Amenitites</label>
      <input type="text" class="form-control amenities" placeholder="Amenities" required>

      <label for="inputRent" class="visually-hidden">Area</label>
      <input type="text" class="form-control area" placeholder="Area" required autofocus>

      <label for="inputArea" class="visually-hidden">image1</label>
      <input type="text" class="form-control image1 " placeholder="image1" required autofocus>

       <label for="inputArea" class="visually-hidden">image2</label>
      <input type="text" class="form-control image2 " placeholder="image2" required autofocus>
      <br>
      <br>
      <!-- <label  for="myfile">Select an image:</label>
      <input type="file" class="file-choosing" name="myfile">
 -->
      <button class="w-100 btn btn-lg btn-dark form-submission" type="submit">Submit</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2020 Your Space</p>
    </form>
    <form action="/" method="POST">


</form>
  </main>


</body>

</html>
