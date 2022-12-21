
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
                <li><a href="index.html">Home</a></li>
                <li><a class="current" href="booking.php">Make a booking</a></li>
                <li><a href="MyBookings.html">My bookings</a></li>
            </ul>
        </nav>
        </header>

        <h2>Make a booking in the form below</h2>

        <form method="post" action="WriteBooking.php">
        <table>
            <tr>
                <td>Email address:</td>
                <td><input type="text" name="Email" size="20" > </td>
            </tr>
            <tr>
                <td>Booking date:</td>
                <td><input type="date" name="BookingDay" size="20" > </td>
            </tr>
            <tr>
                <td>Vehicle:</td>
                <td>
                    <select name = "MakeModel">
                        <option disabled selected>-- Choose vehicle --</option>
                        <?php
                            include ("dbConnect.php");
                            $Query = "SELECT MakeModel,DailyCost FROM Vehicle";
                            $records = mysqli_query($DB,$Query);

                            while($row = mysqli_fetch_array($records))
                            {
                                echo '<option value="'.$row['MakeModel'].'">'.$row['MakeModel'].' costs £'.$row['DailyCost'].'/day</option>';
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Make a booking"/></td>
            </tr>
        </table>
        </form>
        <button id="date">Show current date</button>
        <script src="js/showDate.js"></script>                       
    </body>
</html>