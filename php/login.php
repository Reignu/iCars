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
            <li><a class="current" href="login.php">Log In</a></li>
            <li><a href="RegUser.php">Register</a></li>
        </ul>
    </nav>
</header>

<h2>Existing User - Please enter your Email address and password</h2>

<form method="post" action="checkUser.php">

<table>
 <tr>
  <td>Email address:</td>
  <td><input type="text" name="Email" size="20"/></td>
 </tr>
 <tr>
  <td>Password:</td>
  <td><input type="password" name="Password" size="20"/></td>
 </tr>
 
  <tr>
  <td colspan="2"><input type="submit" value="Log In"/></td>
 </tr>
 </table>
 </form>



</body>
<footer>

</footer>
</html>