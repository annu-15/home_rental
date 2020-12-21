<?php 
session_start();
include('connection.php');
$username = $name = $phone = $email = $password = $cpassword = $phone = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$usernameErr = $nameErr  = $emailErr = $passwordErr = $cpasswordErr = $phoneErr = "";
$b=true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["username"])) {
        $usernameErr = "*Username is required";
        $b=false;

      } else {
        $username = test_input($_POST["username"]);
         if (!preg_match("/^[a-zA-Z0-9]*$/",$username) || $username=='') {
          $usernameErr = "*Only letters and numbers allowed";

          $b=false; 
        }
      
      }
  if (empty($_POST["name"])) {
    $nameErr = "*Name is required";
    $b=false;
  } else {
    $name = test_input($_POST["name"]);
     if (!preg_match("/^[a-zA-Z]*$/",$name) || $name=='') {
      $nameErr = "*Only letters allowed ";
      $b=false; 
    }
  
  }
  if (empty($_POST["phone"])) {
    $phoneErr = "*Contact Number is required";
    $b=false;
  } else {
    $phone = test_input($_POST["phone"]);
    if(!preg_match("/^[0-9]{10,10}$/",$phone) || $phone==''){
      $phoneErr = "*Enter A Valid Contact Number";
      $b=false;
    }
  
  }

  if (empty($_POST["email"])) {
    $emailErr = "*Email is required";
    $b=false;
  } else {
    $email = test_input($_POST["email"]);
     if (!preg_match("/^[a-zA-Z0-9\.]*@[a-z\.]{1,}[a-z]*$/",$email) || $email=='') {
      $emailErr = "*Enter a Valid Email"; 
      $b=false;
    }
  }
  if (empty($_POST["password"])) {
    $passwordErr = "*Password is required";
    $b=false;
  } else {
    $password = test_input($_POST["password"]);
     if (!preg_match("/^[a-zA-Z0-9]{10,}$/",$password) || $password=='') {
      $passwordErr = "*Enter minimum 10 characters ";
      $b=false;
    }
  }

  if (empty($_POST["cpassword"])) {
    $cpasswordErr = "*Confirmation of Password is required";
    $b=false;
  } else {
    $cpassword = test_input($_POST["confirm"]);
    $password= test_input($_POST["password"]);
    if (strcmp($password,$cpassword)!=0) {
      $cpasswordErr = "*Password does not match ";
      $b=false;
    }
  }
}
if($b==true && isset($_POST['sign up']))
{
    $sql = "insert into user(username,name,email,phone,password) values('$username','$name','$email','$phone','$password')";
    $res=$conn->query($sql);
    // $res = mysqli_query($conn,$sql);
    $sql1="select user_id from user where username='$username'";
     $result=$conn->query($sql1);
    // $result =mysqli_query($conn,$sql1);
    $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
    $_SESSION['username']=$username;
    // $_SESSION['type']='normal';
    $_SESSION['id']=$row['user_id'];



     header('Location:homepage.php'); 

 
}
    
    

?>


<!DOCTYPE html>
<html lang="en">
<style type="text/css">
body {
  height: 100%;
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #A9A9A9;
}

.heading {
  padding-bottom: 2rem;
}

/* The container must be positioned relative: */

.select-style {
    border: 1px solid #ccc;
    width: 120px;
    border-radius: 3px;
    overflow: hidden;
    background: #fafafa url("img/icon-select.png") no-repeat 90% 50%;
}

.select-style select {
    padding: 5px 8px;
    width: 130%;
    border: none;
    box-shadow: none;
    background: transparent;
    background-image: none;
    -webkit-appearance: none;
}

.select-style select:focus {
    outline: none;
}

.left-aligned {
  text-align: left;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.ownertenant {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;

}

.name {
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
  margin-bottom: -1px;

}

.phone {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
  border-radius: 0;
}

.emailid {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
  border-radius: 0;
}

.password .cpassword {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}


</style>


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.79.0">
  <title>Sign in</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


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
 
</head>

<body class="text-center">

  <main action="signup.php" class="form-signin" method="POST">
    <form>
      <h1 class="h3 mb-3 fw-normal heading">Please sign in</h1>
    
      <br>
      
      <label for="inputName" class="visually-hidden">Name</label>
      <input type="text" name="name" class="form-control name" placeholder="Name" required>
      <span class="error"><?php echo $nameErr; ?></span>

      <label for="inputusername" class="visually-hidden">Username</label>
      <input type="text" name="username" class="form-control name" placeholder="Username" required>
      <span class="error"><?php echo $usernameErr; ?></span>

      <label for="inputphone" class="visually-hidden">Phone number</label>
      <input type="number" name="phone" class="form-control phone" placeholder="Phone number" required>
      <span class="error"><?php echo $phoneErr; ?></span>

      <label for="inputEmail" class="visually-hidden">Email address</label>
      <input type="email" name="email"class="form-control emailid" placeholder="Email address" required autofocus>
      <span class="error"><?php echo $emailErr; ?></span>

      <label for="inputPassword" class="visually-hidden">Password</label>
      <input type="password" name="password"class="form-control password" placeholder="Password" required>
      <span class="error"><?php echo $passwordErr; ?></span>

      <label for="confirmPassword" class="visually-hidden">confirm Password</label>
      <input type="password" name="cpassword"class="form-control password" placeholder="Confirm Password" required>
      <span class="error"><?php echo $cpasswordErr; ?></span>


      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-dark" type="submit" name="sign up">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2020 Your Space</p>
    </form>
  </main>



</body>

</html>
