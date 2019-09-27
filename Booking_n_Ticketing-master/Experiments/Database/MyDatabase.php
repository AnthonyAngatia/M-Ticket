
    <?php
    echo "testing on\n";
    function connect()
    {
        $dbserver = "localhost";
        $username = "root";
        $password = "";
        $dbname = "booking-ticketing";
        $link = mysqli_connect($dbserver, $username, $password, $dbname) or die("Could not connect");
        return $link;
    }
    connect();
    ?>
    
