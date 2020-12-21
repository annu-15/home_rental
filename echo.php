<?php
session_start();
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

include_once 'connection.php';

"INSERT INTO `user` (`username`, `name`, `email`, `phone`, `password`) VALUES ( 'annu15', 'annapurna', 'annu15@gmail.com', '1234567890', 'annu');";

// $result = mysqli_query($conn,$sql);
// $check = mysqli_num_rows($result);

// if($check > 0){
// 	while($row = mysqli_fetch_assoc($result)){
// 		echo $row['username'];
// 	}
// }


?>

</body>
</html>