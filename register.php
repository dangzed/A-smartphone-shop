<html>
<head>
	<title>A sample form</title>
</head>
<body>
<?php 
    include 'lib/connection.php' ;
    if(isset($_POST['submit'])){
        // get user info with post method
        $username = $_POST['username'];
        $password = $_POST['pass'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        if($username == '' || $password == '' || $name == '' || $email == ''){
            echo 'Please fill in all blank';
        } else{
            // Check if there exists an account
            $sql = "select * from user where username = '$username'";
            $result = mysqli_query($conn, $sql);
            $num_rows = mysqli_num_rows($result);

            if( $num_rows > 0){
                echo 'Already exist this username';
            }else{
                $sql = "insert into user(username,password,name,email) values('$username','$password','$name','$email')";
                mysqli_query($conn,$sql);
                header('Location: login.php');
            }
        }
    }
?>

	<form action="register.php" method="post">
		<table>
			<tr>
				<td colspan="2">Register form</td>
			</tr>	
			<tr>
				<td>Username :</td>
				<td><input type="text" id="username" name="username"></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="password" id="pass" name="pass"></td>
			</tr>
            <tr>
				<td>Full name :</td>
				<td><input type="text" id="name" name="name"></td>
			</tr>
            <tr>
				<td>Email :</td>
				<td><input type="text" id="email" name="email"></td>
			</tr>
            
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="Register"></td>
			</tr>

		</table>
		
	</form>
</body>
</html>