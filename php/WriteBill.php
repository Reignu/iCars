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
                <li><a href="admin.html">Home</a></li>
                <li><a class="current" href="billing.php">Billing facility</a></li>
                <li><a href="availability.php">Cars available</a></li>
            </ul>
        </nav>
        </header>

        <?php
            include("dbConnect.php");

            $Driverid = $_POST["Driverid"];

            $Query = "SELECT Email
            FROM Driver
            WHERE Driverid = '$Driverid'";

            $Result = mysqli_query($DB,$Query);

            $NumResults = mysqli_num_rows($Result);

            if ($NumResults == 1)
            { 
            $row=mysqli_fetch_assoc($Result);
            $Email=$row['Email'];

            echo '<h2>'.'Driver No.: '.$Driverid.', here are your bookings'.'</h2>';
            echo 'Email address: '.$Email;

            $Query2 = "SELECT Booking.VehicleNo,COUNT(BookingDay) AS 'No of hires',MakeModel,DailyCost,COUNT(BookingDay)*DailyCost AS 'Total price for hire'
            FROM Vehicle,Booking
            WHERE Driverid = '$Driverid' AND Booking.VehicleNo=Vehicle.VehicleNo
            GROUP BY Booking.VehicleNo";

            $Result2 = mysqli_query($DB,$Query2);

            $NumResults2 = mysqli_num_rows($Result2);

                if ($NumResults2 > 0)
                {   
                    $TotalHire = 0;
                    $Total = 0;
                    $VAT = 0;
                    $FinalTotal = 0;
                    echo '<table>';
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
                echo 'Cannot find email address';
            }

            function UpdateAccount($Driverid)
            {
                include("dbConnect.php");
                $Query3 = "UPDATE Booking
                SET AccountStatus='I'
                WHERE Driverid = '$Driverid'";

                $Result = mysqli_query($DB,$Query3);

                if($Result)
                {
                    echo '<h2>'.'Account Status updated'.'</h2>';
                    echo '<br>';
                }
                else
                {
                    echo '<h2>'.'Update failed'.'</h2>';
                    echo '<br>';
                }
            }
            echo '<br>';
            echo 'Click only if invoice has been printed and sent:';
            echo '<button onclick="'.UpdateAccount($Driverid).'">Update Account Status to Invoiced</button>';
            echo '<br>';


            ?>

        <button id="invoice">Print my invoice</button>
        <script type="text/javascript" src="js/printInvoice.js"></script>
    </body>
</html>