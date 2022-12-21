<html>
<head>
	<title>iCars - Log In</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<header>
    <h1>iCars</h1>

    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="login.php">Log In</a></li>
            <li><a href="RegUser.php">Register</a></li>
        </ul>
    </nav>
</header>
<?php
  include("dbConnect.php");              // Add in the database connection details

  // Now get the information from the Form
  $Email	 = $_POST['Email'];
  $Password 	 = $_POST['Password'];
  
  $Query = "SELECT Email,Password,Driverid FROM Driver
  WHERE  Email = '$Email'
  AND Password='$Password'";
  
//   Now run the query - i.e. Query the data in the table
  
  $Result = mysqli_query($DB,$Query);	 // $Result gives us a numeric value to check if the query found a match ok. 
				 	 
									   
  $NumResults = mysqli_num_rows($Result);	
  							   
// echo $NumResults;

  if ($NumResults==1)
	{ 
	echo '<h2>'.'Found user with matching password'.'</h2>';
  //	Now find the associated User no
	$row=mysqli_fetch_assoc($Result);
  $UserNo=$row['Driverid'];

  echo '<h2>Associated User no is  '.$UserNo.'<h2>';

    if ($Email == 'admin' && $Password == 'admin')
    {
      echo 'Hello admin';
      echo '<FORM METHOD="LINK" ACTION="admin.html">';
      echo '<INPUT TYPE="submit" VALUE="Enter site, Admin">'.'</FORM>';
    }
    else 
    {
      echo 'Hello user';
      echo '<FORM METHOD="LINK" ACTION="home.html">';
      echo '<INPUT TYPE="submit" VALUE="Enter site">'.'</FORM>';
    }
	}  
  else
  {
	echo '<h2>'.'User not found OR wrong password OR both OR multiple matches found'.'</h2';
  echo '<br>';
  echo '<FORM METHOD="LINK" ACTION="login.php">';
  echo '<INPUT TYPE="submit" VALUE="Back to Login">'.'</FORM>';
  }
    
?>
    
</body>
<footer>  
</footer>
</html>

