<?php
    session_start();

    if ($_SESSION['username'] != admin && $_SESSION['username'] != $_GET['username']) {
         header('Location: permission_denied.php');
    }
 ?>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> <?php echo $_SESSION['username'] ?>'s info</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>
    <div class="container">
      <div class="row">
          <?php
            require_once("lib/connection.php");

            if (isset($_POST["save"])) {
		    	$username = $_POST["usrname"];
		    	$name = $_POST["name"];
                $email = $_POST["email"];
                $pass = $_POST["pass"];
		    	$sql = "update user set name = '$name', email = '$email', password ='$pass' where username = '$username'";
                mysqli_query($conn, $sql);
                if($_SESSION['username'] == 'admin') header('Location:admin/users_management.php');
                else header('Location:index.php');
		    }

            $username = "";
		    $name = "";
            $email = "";
            $pass = "";
		    if (isset($_GET["username"])) {
		    	$username = $_GET["username"];
		    	$sql = "select * from user where username = '$username'";
		    	$query = mysqli_query($conn, $sql);
		    	while ( $data = mysqli_fetch_array($query) ) {
		    		$name = $data["name"];
                    $email = $data["email"];
                    $pass = $data["password"];
		    	}
		    }
          ?>
        <h3> <?php echo $_SESSION['username'] ?>'s info</h3>
        <form method="POST" name="update_user">
        <table class="table">
          <input type="hidden" name="usrname" value="<?php echo $username; ?>">
            <tr><td>Password : </td><td><input type="password" name="pass" value="<?php echo $pass; ?>" /></td></tr>
          	<tr><td>Full name : </td><td><input type="text" name="name" value="<?php echo $name; ?>" /></td></tr>
          	<tr><td>Email : </td><td><input type="text" name="email" value="<?php echo $email; ?>" /></td></tr>
          	<tr><td colspan="2"><input type="submit" name="save" value="Save changes"></td></tr>
        </table>
        </form>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  

</body></html>