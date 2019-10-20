<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="css/mticket.css">

    <!-- Load an icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">
    <title>Profile</title>
</head>
<style>
* {
    padding: 0px;
    margin: 0px;
    box-sizing: border-box;
}

.user-profile {
    font-weight: bold;
    margin-top: 9em;
    margin-left: 15em;
    z-index: 9;
    max-width: 65%;
    display: flex;
    border: 2px solid black;

}

.user-profile img {
    margin: 1em;

}

.user-profile div {
    font-size: 24pt;
    margin-left: 5em;
    padding: 5px;
    flex: 2;

}
</style>
<body>
    <header class="header">
        <div class="header_inner d-flex flex-row align-items-center justify-content-start">
            <div class="logo"><a href="Homepage.php">M-ticket</a></div>
            <nav class="main_nav">
                <ul>
                    <li><a href="browse.php">browse events</a></li>
                    <li><a href="#">about us</a></li>
                    <li><a href="#">contact</a></li>
                </ul>
            </nav>
            <div class="header_content ml-auto">
                <div class="shopping">
                    <!-- Cart -->
                    <a href="cart.php">
                        <div class="cart">
                            <img src="cart3.png" width="30" height="30" alt="">
                            <div class="cart_num_container">
                                <div class="cart_num_inner">
                                    <div class="cart_num">0</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <a href="UserProfile.php" style="color:black;">
                <div class="avatar" id="avatar">
                    <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
                    <img src="avatar.png" alt="">
                </div>
            </a>
            <!-- &emsp; -->

        </div>
    </header>
    <?php 
    $session_username =  htmlspecialchars($_SESSION["username"]);
    $sql = "SELECT * FROM user_table WHERE Username='$session_username' LIMIT 1";
    require('require.php');
    $rowData = getData($sql);
    foreach ($rowData as $value) {
        $names = $value['Name'];
    }
        ?>
    <div class="user-profile">
        <img class="poster" id="poster" src="avatar.png" alt="profile" height="250" max-width="250" />
         <form action="UserProfile.php" method="post">
        <div class="poster-details">
            <h4>First Name</h4>
            <input type="text" name="name" id="name"  disabled = "true"style="font-size: 14pt;max-width:500px; height:45px;" value = <?php  echo $names ?> >
            <h4>Username</h4>
            <input type="text" name="user-name" id="user-name"  disabled = "true"style="font-size: 14pt;max-width:500px; height:45px;" value = "">
            <h4>Email</h4>
            <input type="email" name="e-mail" id="e-mail"  disabled = "true"style="font-size: 14pt;max-width:500px; height:45px; " value = "">
            <h4>Phone Number</h4>
            <?php // $password = $value['Password']; ?>
            <input type="tel" name="tel-no" id="tel-no"  disabled = "true"style="font-size: 14pt;max-width:500px; height:45px; " value = "">
            <h4>Coupon points</h4>
            <input type="text" name="coupon-points" id="" disabled = "true" value = "0" style="font-size: 14pt;max-width:500px; height:45px; ">
            <h4>Password<span id = "message" style = "font-size: 10pt; color:red;"> Enter current password to edit!</span></h4>
            <input type="password" name="pass" id="input-password" style="font-size: 14pt;max-width:500px; height:45px;" >
            <p style = "font-size: 10pt; color:red; cursor:pointer;">Forgotten Password?</p>
            <p id = "validate-click"  onclick = "validation()" style = "font-size: 14pt; cursor:pointer;"> Click to validate</p>
        </div>
    </div>
</body>
</html>