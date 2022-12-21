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
            <li><a class="current" href="RegUser.php">Register</a></li>
        </ul>
    </nav>
</header>
<h2>Register User details</h2>
<script src="js/register.js"></script>
<form name="myForm" method="POST" onsubmit="return validateForm()" action="WriteUser.php">

<table>
 <tr>
  <td>Email address:</td>
  <td><input type="email" name="Email" size="20" > </td>
 </tr>
 <tr>
  <td>Password:</td>
  <td><input type="password" name="Password" placeholder="max. 8 characters" size="20" maxlength="8" > </td>
 </tr>
 <tr>
  <td>Surname:</td>
  <td><input type="text" name="Surname" size="20" > </td>
 </tr>
 <tr>
  <td>Initials:</td>
  <td><input type="text" name="Initials" placeholder="e.g. Bob Ross, type BR" size="20" > </td>
 </tr>
 <tr>
  <td>Date of Birth:</td>
  <td><input type="date" name="DateOfBirth" size="20" > </td>
 </tr>
 <tr>
  <td>Mobile No.:</td>
  <td><input type="tel" name="PhoneNo" placeholder="format: +447321456321" size="20" > </td>
 </tr>
 <tr>
  <td>Gender:</td>
  <td><label for="male">Male
  <input type="radio" id="male" name="Gender" value="M">
  </label></td>
  <td><label for="female">Female
  <input type="radio" id="female" name="Gender" value="F">
  </label></td>
 </tr>
 <tr>
  <td>DVLA number:</td>
  <td><input type="text" name="DvlaNo" size="20" > </td>
 </tr>
 
  
 <td colspan="2"><input type="submit"  value="Register"/></td>
 </tr>
<tr>
  <td colspan="2"><input type="reset" value="Clear"/></td>
 </tr>
</table>
</form>
</body>
<footer>
 
</footer>
</html>