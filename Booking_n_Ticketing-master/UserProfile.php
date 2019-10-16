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
    margin-left: 9em;
    z-index: 9;
    width: 75%;
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
            <a href="account.php" style="color:black;">
                <div class="avatar" id="avatar">
                    <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
                    <img src="avatar.png" alt="">
                </div>
            </a>
            <!-- &emsp; -->

        </div>
    </header>
    <div class="user-profile">
        <img class="poster" id="poster" src="avatar.png" alt="profile" height="300" max-width="300" />
        <div class="poster-details">
            <h4>First Name</h4>
            <input type="text" name="first-name" id="" style="max-width:500px; height:45px ;">
            <h4>User Name</h4>
            <input type="text" name="user-name" id="" style="max-width:500px; height:45px;">
            <h4>Email</h4>
            <input type="email" name="e-mail" id="" style="max-width:500px; height:45px;">
            <h4>Phone Number</h4>
            <input type="tel" name="tel-no" id="" style="max-width:500px; height:45px;">
            <h4>Password</h4>
            <input type="password" name="pass" id="" style="max-width:500px; height:45px;">
        </div>

    </div>
    <center>
        <button class="btn">Save</button>
    </center>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>