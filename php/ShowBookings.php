<!DOCTYPE html>

<html>
    <head>
        <title>iCars - My Bookings</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
        <h1>iCars</h1>

        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="booking.php">Make a booking</a></li>
                <li><a class="current" href="MyBookings.html">My bookings</a></li>
            </ul>
        </nav>
        </header>
        <div class="myDiv">
        <?php
            include("dbConnect.php");

            $Email = $_POST["Email"];

            $Query = "SELECT Driverid
            FROM Driver
            WHERE Email = '$Email'";

            $Result = mysqli_query($DB,$Query);

            $NumResults = mysqli_num_rows($Result);

            // echo $NumResults;

        if ($NumResults == 1)
        { 
        $row=mysqli_fetch_assoc($Result);
        $UserNo=$row['Driverid'];

        echo '<h2>'.'Driver No.: '.$UserNo.', here are your bookings'.'</h2>';
        echo 'Email address: '.$Email;

        $Query2 = "SELECT Booking.VehicleNo,COUNT(BookingDay) AS 'No of hires',MakeModel,DailyCost,COUNT(BookingDay)*DailyCost AS 'Total price for hire'
        FROM Vehicle,Booking
        WHERE Driverid = '$UserNo' AND Booking.VehicleNo=Vehicle.VehicleNo
        GROUP BY Booking.VehicleNo";

        $Result2 = mysqli_query($DB,$Query2);

        $NumResults2 = mysqli_num_rows($Result2);

            if ($NumResults2 > 0)
            {   
                $TotalHire = 0;
                $Total = 0;
                $VAT = 0;
                $FinalTotal = 0;
                echo '<table class="Records">';
                echo '<tr>';
                echo '<th>'.'Vehicle No.'.'</th>';
                echo '<th>'.'No. of hires'.'</th>';
                echo '<th>'.'Vehicle'.'</th>';
                echo '<th>'.'Cost per day'.'</th>';
                echo '<th>'.'Total price for vehicle'.'</th>';
                echo '</tr>';
                while ($Row = mysqli_fetch_assoc($Result2))
                {   
                    if ($Row['No of hires'] > 1)
                    {
                    $Discount = $Row['Total price for hire']*0.9;
                    echo '<tr>';
                    echo '<td>'.$Row['VehicleNo'].'</td>';
                    echo '<td>'.$Row['No of hires'].'</td>';
                    echo '<td>'.$Row['MakeModel'].'</td>';
                    echo '<td>'.number_format($Row['DailyCost'],2).'</td>';
                    echo '<td>'.number_format($Discount,2).'</td>';
                    echo '</tr>';
                    $TotalHire += $Row['No of hires'];
                    $Total += $Discount;
                    $DiscountValue = $Row['Total price for hire']*0.1;
                    }
                    else
                    {
                    echo '<tr>';
                    echo '<td>'.$Row['VehicleNo'].'</td>';
                    echo '<td>'.$Row['No of hires'].'</td>';
                    echo '<td>'.$Row['MakeModel'].'</td>';
                    echo '<td>'.number_format($Row['DailyCost'],2).'</td>';
                    echo '<td>'.number_format($Row['Total price for hire'],2).'</td>';
                    echo '</tr>';
                    $TotalHire += $Row['No of hires'];
                    $Total += $Row['Total price for hire'];
                    }
                    $BeforeDiscount = $Total + $DiscountValue;
                    $VAT = $Total * 0.2;
                    $FinalTotal = $Total + $VAT;  
                } 
                echo '</table>';
                echo '<br>';
                echo 'Total no. of hires: '.$TotalHire;
                echo '<br>';
                echo 'Total before discount: £'.number_format($BeforeDiscount,2);
                echo '<br>';
                echo 'Discount value: £'.number_format($DiscountValue,2);
                echo '<br>';
                echo 'Total cost without VAT: £'.number_format($Total,2);
                echo '<br>';
                echo 'VAT: £'.number_format($VAT,2);
                echo '<br>';
                echo 'Final total: £'.number_format($FinalTotal,2); 
            }
            else
            {
            echo '0 results';
            }
        }
        else
        {
            echo 'Invalid email address';
        }
        
        ?>
        <button id="invoice">Print my invoice</button>
        </div>
        <script type="text/javascript" src="js/printInvoice.js"></script>
    </body>
</html>