<!DOCTYPE html>
<!-- Adam Ungier-->
<!-- Successful Login-->

<html>
    <head>
        <title>iCars - Billing Facility</title>
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
                <li><a href="availibility.php">Cars Available</a></li>
            </ul>
        </nav>
        </header>

        <h2>Welcome Admin - choose a User No. to create an invoice</h2>

        <form method="post" action="WriteBill.php">
            <table>
                <tr>
                    <td>User No.:</td>
                    <td>
                        <select name = "Driverid">
                            <option disabled selected>-- Choose User No --</option>
                            <?php
                                include ("dbConnect.php");
                                $Query = "SELECT Driverid FROM Booking GROUP BY Driverid";
                                $records = mysqli_query($DB,$Query);

                                while($row = mysqli_fetch_array($records))
                                {
                                    echo '<option value="'.$row['Driverid'].'">'.$row['Driverid'].'</option>';
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Show bookings"/></td>
                </tr>
            </table>
        </form>    

    </body>
</html>