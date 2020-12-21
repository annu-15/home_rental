<?php
   include("connection.php");
   session_start();
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    $username='';$password='';$b=true;
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['username']))
				$username=test_input($_POST['username']);
				else $b=false;
        if(isset($_POST['password']))
				$password=test_input($_POST['password']);
				else $b=false;
				$tablename='';$id='';
				if(empty($_POST['username']))
				$b=false;
				if($b==false)
				{
					header('Location: login.php');
				}
       
            $id='user_id';
            $tablename='user';
      
        $q="select $id,password from $tablename where username='$username'";
        echo $q;
        $result=$conn->query($q);
        if($result==true)
        {
            $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
        }
        else
        {
					header('Location: login.php');
        }
        if($row['password']==$password)
        {
            $_SESSION['username']=$username;
            // $_SESSION['type']=$type;
            if($id=='user_id' && $b==true)
            {
                $_SESSION['id']=$row['user_id'];
               header('Location:home.php');
            }

        }
        else
        {
            echo "Invalid Password!!!!";
            header('Location: login.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Login page</title>

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


    <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=prb090LPy1h8s0AGVjEJF6JuN-9uMFeD3O6Bv6FHLfxTP5Oc0KuiV8Uypzp9H7BzyPq9MLIIVAZCZnuS7iuUrb3gEXYG4ldqVTFea_YjbIA" charset="UTF-8"></script>
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
      body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #F5F5F5;
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
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

    </style>


    <!-- Custom styles for this template -->
    <link href="styles.css" rel="stylesheet">
  </head>
  <body class="text-center">

<main action="login.php" class="form-signin" method="POST">
  <form>
  
    <h1 class="h3 mb-3 fw-normal">Please login</h1>
    <label for="inputEmail" class="visually-hidden">"Email address</label>
    <input type="email" name="emailid" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="visually-hidden">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-dark" type="submit"><!-- <a href="home.php"> -->Login<!-- </a> --></button>
    <p class="mt-5 mb-3 text-muted">&copy; Your Space</p>
  </form>
</main>



</body>
</html>
