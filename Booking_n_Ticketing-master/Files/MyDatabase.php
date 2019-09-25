
    <?php

    function connect()
    {
        $dbserver = "localhost";
        $username = "root";
        $password = "";
        $dbname = "booking-ticketing";
        $link = mysqli_connect($dbserver, $username, $password, $dbname) or die("Could not connect");
        echo "Connected";
        return $link;
    }

    function setData($sql)
    {
        $link = connect();
        if (mysqli_query($link, $sql)) {
            echo "New record created successfully";
        } else {
            "Error: " . $sql . "<br>" . mysqli_error($link);
        }
    }
    function getData($sql)
    {

        $link = connect();
        $result = mysqli_query($link, $sql);

        $datas = array();
        if (mysqli_num_rows($result) > 0) {
            echo "Data is here";
            while ($row = $result->fetch_assoc()) {
                echo $row['User_ID'];
                $datas[] = $row;
                print_r($datas);
                print_r($row);
            }
        }
    }

    ?>
    
