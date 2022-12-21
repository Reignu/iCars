<html>
    <head>
        <title>iCars - Booking Successful</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
        <h1>iCars</h1>

        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a class="current" href="booking.php">Make a booking</a></li>
                <li><a href="#">My bookings</a></li>
            </ul>
        </nav>
        </header>

        <?php
            include("dbConnect.php");

            echo $VehicleNo;
            echo $BookingDay;
            echo $UserNo;

            // $Query = "INSERT INTO Booking (VehicleNo,BookingDay,Driverid,AccountStatus)
            // VALUES ('$VehicleNo','$BookingDay','$UserNo',NULL)";

            // $Result = mysqli_query($DB,$Query);

            // if ($Result)
             //   { 
             //   echo '<h2>'.'Booking successful.'.'</h2>';
              //  echo '<h2>'.'Go to My Bookings to print an invoice.'.'</h2>';
                //}  
            // else
               // {
              //  echo '<h2>'.'Booking failed'.'</h2>';
               // }
        ?>

    <FORM METHOD="LINK" ACTION="SuccessBooking.php">
    <INPUT TYPE="submit" VALUE="Go to My Bookings"></FORM>
        
    </body>
</html>