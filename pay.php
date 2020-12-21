<?php

include_once 'connection.php'
?>

<!DOCTYPE html>
<html>
<style type="text/css">
	body{
	margin: 0px;
	padding: 0px;
	font-family: 'Raleway', sans-serif;
	background-color: #ece5ff;
}
.form-title{
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 50px;
    font-size: 20px;
    background:#27ae60;
    border-radius : 5px;
}

.paybox{
	width: 400px;
	height: 520px;
	color: #fff;
	top:50%;
	left:50%;
	position: absolute;
	transform: translate(-50%,-50%);
	box-sizing: border-box;
	background-color: #ffffff;
	border-radius: 10px;

}

.paybox input{
	width:80%;
	margin: 10px;
	margin-left: 20px;
    line-height: normal;
    font-family: inherit;
    font-size: 30%
    background: #e8ebed;
    color: #576366;
}
 .form-title{
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 70px;
    font-size: 20px;
    font-weight: bold;
    background:#27ae60;
}
.paybox input[type="text"],input[type="name"],input[type="text"],input[type="name"],input[type="text"]
{
	height: 35px;
	outline: none;
	border: none;
	background: #e8ebed;
    color: #576366;
    padding: 5px 15px;
    border-radius: 5px;
}

  #button{
    width: 6em;
    background: #075bba;
    border-radius: 5px;
    margin-left: 140px;
    margin-top: 5px;
  }
a {
    display: block;
    width: 100%;
    line-height: 2em;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    color: white;
}
a:hover {
    color: blue;
    background: #eff;
}
   

</style>
<head>
	<title> Rent payment</title>
</head>
<body>
	<div class="paybox">
		
	<form class="box" action="pay.php" method="_POST">
		 <div class="form-title">Payment Details</div>
         <input type="text" name="house_id" placeholder="House ID">
		 <input type="text" name="tenant_id" placeholder="Tenant ID">
		 <input type="name" name="tenant_name" placeholder="Tenant Name"> 
		 <input type="text" name="owner_id" placeholder="Owner ID">
	     <input type="name" name="owner_name" placeholder="Owner Name">
	     <input type="text" name="amount" placeholder="Enter Amount">
	     <div type="button"id="button" name="Next"><a href="card.php">Next</a></div>
	     
</form>
</div>

</body>
</html