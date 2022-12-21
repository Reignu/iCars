
<html>
    <head>
        <title>iCars - Make a Booking</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
        <h1>iCars</h1>

        <nav>
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a class="current" href="booking.php">Make a booking</a></li>
                <li><a href="MyBookings.html">My bookings</a></li>
            </ul>
        </nav>
        </header>

        <?php
            include("dbConnect.php");

            $Email = $_POST["Email"];
            $BookingDay = $_POST["BookingDay"];
            $MakeModel = $_POST["MakeModel"];

            $Query = "SELECT Driverid,VehicleNo,DailyCost 
            FROM Driver,Vehicle
            WHERE Email = '$Email'
            AND MakeModel = '$MakeModel'";

            $Result = mysqli_query($DB,$Query);

            $NumResults = mysqli_num_rows($Result);	
  							   
            // echo $NumResults;

            $row=mysqli_fetch_assoc($Result);
            $UserNo=$row['Driverid'];
            $VehicleNo=$row['VehicleNo'];
            $DailyCost=$row['DailyCost'];

            if ($NumResults == 1)
                { 
                $Query2 ="SELECT Driverid
                FROM Booking
                WHERE VehicleNo = '$VehicleNo' AND BookingDay = '$BookingDay'";

                $Result2 = mysqli_query($DB,$Query2);

                $NumResults2 = mysqli_num_rows($Result2);

                $row2 = mysqli_fetch_assoc($Result2);

                $Driverid = $row2['Driverid'];

                if($Driverid == 1000)
                {
                    $Query3 = "UPDATE Booking
                    SET Driverid = '$UserNo'
                    WHERE VehicleNo = '$VehicleNo' AND BookingDay = '$BookingDay'";

                    $Result3 = mysqli_query($DB,$Query3);

                    if ($Result3)
                        {
                        echo '<h2>'.'Booking Successful, go to My Bookings to print invoice'.'</h2>';
                        }
                    else
                        {
                        echo '<h2>'.'FAIL'.'</h2>';
                        }
                }
                else
                {
                    echo '<h2>'.$MakeModel.' is not available for '.$BookingDay.'</h2>';
                    
                }
                
                }  
            else
                {
                echo '<h2>'.'Booking failed'.'</h2>';
                }
        ?>

    <FORM METHOD="LINK" ACTION="MyBookings.html">
    <INPUT TYPE="submit" VALUE="My Bookings"></FORM>

    <FORM METHOD="LINK" ACTION="booking.php">
    <INPUT TYPE="submit" VALUE="Back to Booking form"></FORM>
        
    </body>
</html>