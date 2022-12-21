<html>
<head>
	<title>iCars - Register</title>
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

  // Get the information from  RegUser.php

  $Email		 = $_POST['Email'];
  $Password   	 = $_POST['Password'];
  $Surname = $_POST['Surname'];
  $Initials = $_POST['Initials'];
  $DateOfBirth = $_POST['DateOfBirth'];
  $PhoneNo = $_POST['PhoneNo'];
  $Gender = $_POST['Gender'];
  $DvlaNo = $_POST['DvlaNo'];

  // At this point we have the information from the form and we can process accordingly.
  
  // Create the SQL statement - Thie SQL statement follows the general insert statement which is :
  // insert into [TableName] [Fieldnames] Values [values to insert] - we are inserting into the users table 
  // so our SQl statement will be
  
  $Query = "INSERT INTO Driver (Email,Password,Surname,Initials,DateOfBirth,PhoneNo,Gender,DvlaNo)
  VALUES ('$Email','$Password','$Surname','$Initials','$DateOfBirth','$PhoneNo','$Gender','$DvlaNo')";
  
  // Now run the query - i.e. Insert the data into the table
  
  $Result = mysqli_query($DB,$Query); 	 // $Result gives us a boolean value to check if the insert was completed ok. 
					 // indicates success. This is very useful for debugging purposes
//  echo $Result;

 if ($Result)
	
	echo '<h2>'.'User login details inserted'.'</h2>';		
     else

	echo '<h2>'.'Sorry - unable to complete the operation at present'.'</h2>';
  

?>

<FORM METHOD="LINK" ACTION="RegUser.php">
<INPUT TYPE="submit" VALUE="Back to Registration">
</FORM>



</body>
<footer>
</footer>
</html>
