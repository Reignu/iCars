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
                <li><a href="billing.php">Billing facility</a></li>
                <li><a class="current" href="availability.php">Cars available</a></li>
            </ul>
        </nav>
        </header>

        <form method="post">
            <br/>
            <input type="submit" name="available" id="available" value="Make cars available"/><br/>
        </form>

        <?php
            function carAvailable(){
                    include("dbConnect.php");
                    $Query4 = "INSERT INTO Booking (VehicleNo, BookingDay, Driverid, AccountStatus)
                    VALUES
                    (14, '2021-06-11', 1000, NULL),
                    (14, '2021-06-12', 1000, NULL),
                    (14, '2021-06-13', 1000, NULL),
                    (14, '2021-06-14', 1000, NULL),
                    (14, '2021-06-15', 1000, NULL),
                    (14, '2021-06-16', 1000, NULL),
                    (14, '2021-06-17', 1000, NULL),
                    (14, '2021-06-18', 1000, NULL);";

                    $Result4 = mysqli_query($DB,$Query4);

                    if ($Result4){
                        echo 'Cars have been made available';
                    }
                    else{
                        echo 'Fail';
                    }  
            }

            if(array_key_exists('available',$_POST)){
                carAvailable();
             }
        ?>
    </body>
</html>