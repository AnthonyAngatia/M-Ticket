

<?php 
session_start();
if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
  $sess = $_SESSION["username"];
//  echo 'Set and not empty, and no undefined index error!';
}
else{
  $sess = "null";
  // echo "empty";
}
require_once('require.php');
$userid = $_SESSION['user_id'];
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
    /* max-width: 65%; */
    max-width: 90%;
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
.wrap-dash-userprofile{
      display:grid;
        /* grid-column-gap: 1em; */
        /* grid-row-gap: 5em; */
        grid-template-columns: 1fr 4fr;
    }
    .dashb{
      display:none;
      border:2px solid;
      min-height:300px;
      max-width:250px;
      margin-top: 9em;
          }
    .dashb li{
      font-size: 12pt;
      padding:2em 3em;
      color: #009fe5;
      cursor:pointer;
    }
        .save_button
{
   margin-top: 25px;
  width: 142px;
  height: 46px;
  background: #937c6f;
  color: #FFFFFF;
  font-size: 12px;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  border: none;
  outline: none;
  cursor: pointer;
  -webkit-transition: all 200ms ease;
  -moz-transition: all 200ms ease;
  -ms-transition: all 200ms ease;
  -o-transition: all 200ms ease;
  transition: all 200ms ease;
}

    
</style>

<body>
    <header class="header">
        <div class="header_inner d-flex flex-row align-items-center justify-content-start">
            <div class="logo"><a href="Homepage.php">M-ticket</a></div>
            <nav class="main_nav">
                <ul>
                    <li><a onclick = "dashboardOpen();" style = "color: #009fe5; cursor:pointer;">Dashboard</a></li>
                    <li><a href="browse.php">browse events</a></li>
                    <li><a href="#">about us</a></li>
                    <li><a href="#">contact</a></li>
                </ul>
            </nav>
<div class="header_content ml-auto">
        <div class="shopping">
           <a href="account.php" style="color:black;">
            <div class="avatar" id="avatar"><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
              <img src="avatar.png" alt="">
            </div>
            
               <!-- session -->
            <script>
              if ('<%=Session["username"] == null%>') {
                //alert('null session');
               // document.querySelector('.avatar').style.display = 'none';
              } else {
                //alert('Session found');
              }
            </script>
          </a>
         
          <!-- Cart -->
          <a href="cart.php">
            <div class="cart">
              <img src="cart3.png" width="30" height="30" alt="">
              <div class="cart_num_container">
                <div class="cart_num_inner">
                  <div class="cart_num"><?php 
                                        if (  isset( $_SESSION['cart_tickets'])  && !empty($_SESSION['cart_tickets'])) {
                                            echo sizeof($_SESSION['cart_tickets']);
                                        } else{
                                            echo "0";
                                        }
                                        ?> 
                                        </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    

    </div>
  </header>
    <?php 
    $session_username =  htmlspecialchars($_SESSION["username"]);
    $sql = "SELECT * FROM user_table WHERE Username='$session_username' LIMIT 1";
    $rowData = getData($sql);
    foreach ($rowData as $value) {



        ?>
    
    
    
    
    <div class="wrap-dash-userprofile">
    <div class="dashb">
    <ul>
      <a onclick = "dashboardClose();"style = "color: #009fe5; cursor:pointer; margin:8px; float:right;"><i class="fa fa-2x fa-arrow-circle-left"></i></a>
      <br><br>
      <li><a href = "view_events.php" id = "events"><div class="section_subtitle">my events</div></a></li>
      <li><a href = "UsersRequest.php" id = "requests"><div class="section_subtitle">requests</div></a></li>
      <li><a href = "PayInstallment.php"><div class="section_subtitle">pending tickets</div></a></li>
    </ul>
    
    </div>
    <center>
    <div class="user-profile">
        <img class="poster" id="poster" src="avatar.png" alt="profile" height="250" max-width="250" />
         <form action="UserProfile.php" method="post" id = "form">
        <div class="poster-details" style="width: 400px;">
            
            <div class="section_subtitle" style="font-size: 16px !important;">first name</div>
            <input type="text" name="name" id="name"  disabled = "true"style="font-size: 14pt; width:300px; height:45px;" value = <?php  echo $value['Name'];?>>
            <div class="section_subtitle" style="font-size: 16px !important;">user name</div>
            <input type="text" name="user-name" id="user-name"  disabled = "true"style="font-size: 14pt;width:300px; height:45px;" value = <?php  echo $value['Username']; ?>>
            <div class="section_subtitle" style="font-size: 16px !important;">email</div>
            <input type="email" name="e-mail" id="e-mail"  disabled = "true"style="font-size: 14pt;width:300px; height:45px; " value = <?php  echo $value['Email']; ?>>
          <div class="section_subtitle" style="font-size: 16px !important;">phone number</div>
            <?php  $password = $value['Password']; ?>
            <input type="tel" name="tel-no" id="tel-no"  disabled = "true"style="font-size: 14pt;width:300px; height:45px; " value = <?php  echo $value['PhoneNo']; }?>>
            <div class="section_subtitle" style="font-size: 16px !important;">reward points</div>
            <input type="text" name="coupon-points" id="" disabled = "true" value = "0" style="font-size: 14pt; width:300px; height:45px; ">
            <div class="section_subtitle" style="font-size: 16px !important;">password</div>
            <span id = "message" style = "font-size: 10pt; color:red;"> Enter current password to edit!</span>
            <input type="password" name="pass" id="input-password" style="font-size: 14pt; width:300px; height:45px;" >
            <p style = "font-size: 10pt; color:red; cursor:pointer;">Forgotten Password?</p>
            <p id = "validate-click"  onclick = "validation()" style = "font-size: 14pt; cursor:pointer; color: blue; font-family: timesnewroman;"> Click to validate</p>
     
        </div>
    </div>
  </div>
</center>
        <!-- <button class="btn" input = "submit">Save</button> -->
   <center>
        <!-- Requests</button> -->
        <input type="submit" value="Save" class="save_button">
    </center>  
    </form>
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <div class="footer_logo"><a href="HomePage.php">M-ticket</a></div>
            <nav class="footer_nav">
              <ul>
                <li><a href="browse.php">events</a></li>
                <li><a href="HomePage.php">create event</a></li>
                <li><a href="about.php">about us</a></li>
                <li><a href="contact.php">contact</a></li>
              </ul>
            </nav>
            <div class="footer_social">
              <ul>
                <li>
                  <a href="#"
                    ><i class="fa fa-pinterest" aria-hidden="true"></i
                  ></a>
                </li>
                <li>
                  <a href="#"
                    ><i class="fa fa-linkedin" aria-hidden="true"></i
                  ></a>
                </li>
                <li>
                  <a href="#"
                    ><i class="fa fa-instagram" aria-hidden="true"></i
                  ></a>
                </li>
                <li>
                  <a href="#"
                    ><i class="fa fa-reddit-alien" aria-hidden="true"></i
                  ></a>
                </li>
                <li>
                  <a href="#"
                    ><i class="fa fa-twitter" aria-hidden="true"></i
                  ></a>
                </li>
              </ul>
            </div>
            <div class="copyright">
              Copyright &copy;<script>
                document.write(new Date().getFullYear());
              </script>
              All rights reserved
            </div>
          </div>
        </div>
      </div>
    </footer>
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
    <script>
function SHA1(msg) {
 function rotate_left(n,s) {
 var t4 = ( n<<s ) | (n>>>(32-s));
 return t4;
 };
 function lsb_hex(val) {
 var str='';
 var i;
 var vh;
 var vl;
 for( i=0; i<=6; i+=2 ) {
 vh = (val>>>(i*4+4))&0x0f;
 vl = (val>>>(i*4))&0x0f;
 str += vh.toString(16) + vl.toString(16);
 }
 return str;
 };
 function cvt_hex(val) {
 var str='';
 var i;
 var v;
 for( i=7; i>=0; i-- ) {
 v = (val>>>(i*4))&0x0f;
 str += v.toString(16);
 }
 return str;
 };
 function Utf8Encode(string) {
 string = string.replace(/\r\n/g,'\n');
 var utftext = '';
 for (var n = 0; n < string.length; n++) {
 var c = string.charCodeAt(n);
 if (c < 128) {
 utftext += String.fromCharCode(c);
 }
 else if((c > 127) && (c < 2048)) {
 utftext += String.fromCharCode((c >> 6) | 192);
 utftext += String.fromCharCode((c & 63) | 128);
 }
 else {
 utftext += String.fromCharCode((c >> 12) | 224);
 utftext += String.fromCharCode(((c >> 6) & 63) | 128);
 utftext += String.fromCharCode((c & 63) | 128);
 }
 }
 return utftext;
 };
 var blockstart;
 var i, j;
 var W = new Array(80);
 var H0 = 0x67452301;
 var H1 = 0xEFCDAB89;
 var H2 = 0x98BADCFE;
 var H3 = 0x10325476;
 var H4 = 0xC3D2E1F0;
 var A, B, C, D, E;
 var temp;
 msg = Utf8Encode(msg);
 var msg_len = msg.length;
 var word_array = new Array();
 for( i=0; i<msg_len-3; i+=4 ) {
 j = msg.charCodeAt(i)<<24 | msg.charCodeAt(i+1)<<16 |
 msg.charCodeAt(i+2)<<8 | msg.charCodeAt(i+3);
 word_array.push( j );
 }
 switch( msg_len % 4 ) {
 case 0:
 i = 0x080000000;
 break;
 case 1:
 i = msg.charCodeAt(msg_len-1)<<24 | 0x0800000;
 break;
 case 2:
 i = msg.charCodeAt(msg_len-2)<<24 | msg.charCodeAt(msg_len-1)<<16 | 0x08000;
 break;
 case 3:
 i = msg.charCodeAt(msg_len-3)<<24 | msg.charCodeAt(msg_len-2)<<16 | msg.charCodeAt(msg_len-1)<<8 | 0x80;
 break;
 }
 word_array.push( i );
 while( (word_array.length % 16) != 14 ) word_array.push( 0 );
 word_array.push( msg_len>>>29 );
 word_array.push( (msg_len<<3)&0x0ffffffff );
 for ( blockstart=0; blockstart<word_array.length; blockstart+=16 ) {
 for( i=0; i<16; i++ ) W[i] = word_array[blockstart+i];
 for( i=16; i<=79; i++ ) W[i] = rotate_left(W[i-3] ^ W[i-8] ^ W[i-14] ^ W[i-16], 1);
 A = H0;
 B = H1;
 C = H2;
 D = H3;
 E = H4;
 for( i= 0; i<=19; i++ ) {
 temp = (rotate_left(A,5) + ((B&C) | (~B&D)) + E + W[i] + 0x5A827999) & 0x0ffffffff;
 E = D;
 D = C;
 C = rotate_left(B,30);
 B = A;
 A = temp;
 }
 for( i=20; i<=39; i++ ) {
 temp = (rotate_left(A,5) + (B ^ C ^ D) + E + W[i] + 0x6ED9EBA1) & 0x0ffffffff;
 E = D;
 D = C;
 C = rotate_left(B,30);
 B = A;
 A = temp;
 }
 for( i=40; i<=59; i++ ) {
 temp = (rotate_left(A,5) + ((B&C) | (B&D) | (C&D)) + E + W[i] + 0x8F1BBCDC) & 0x0ffffffff;
 E = D;
 D = C;
 C = rotate_left(B,30);
 B = A;
 A = temp;
 }
 for( i=60; i<=79; i++ ) {
 temp = (rotate_left(A,5) + (B ^ C ^ D) + E + W[i] + 0xCA62C1D6) & 0x0ffffffff;
 E = D;
 D = C;
 C = rotate_left(B,30);
 B = A;
 A = temp;
 }
 H0 = (H0 + A) & 0x0ffffffff;
 H1 = (H1 + B) & 0x0ffffffff;
 H2 = (H2 + C) & 0x0ffffffff;
 H3 = (H3 + D) & 0x0ffffffff;
 H4 = (H4 + E) & 0x0ffffffff;
 }
 var temp = cvt_hex(H0) + cvt_hex(H1) + cvt_hex(H2) + cvt_hex(H3) + cvt_hex(H4);

 return temp.toLowerCase();
}
function enableInput(){
    document.getElementById('name').disabled = false;
    document.getElementById('user-name').disabled = false;
    document.getElementById('e-mail').disabled = false;
    document.getElementById('tel-no').disabled = false;
    document.getElementById('password').disabled = false;
    document.getElementById('message').style.display = "none";
}
        function validation(){
            const valid = document.getElementById('validate-click');
            var inputPass = document.getElementById('input-password').value;//TODO:Var bcoz ur passing to another function.
            const realPass = "<?php echo $password ?>";
            inputPass = SHA1(inputPass);
            // alert(realPass);
            // alert(inputPass);
            if(realPass == inputPass){
                enableInput();
                alert("Access granted");
            }
            else{
                alert("Incorrect Pass");
            }
        }

        </script>
        <script>
    function dashboardOpen(){
      document.querySelector('.dashb').style.display = "unset";
    }
    function dashboardClose(){
      document.querySelector('.dashb').style.display = "none";
    }
    </script>
    <script>
    /*
    TODO:script to check if session exist
   */
    var sess = "<?php echo $sess; ?>";
    if (sess == "null") {
        // alert("null");
        document.getElementById('avatar').style.display = "none";
    } else {
        // alert("not null");
    }
    </script>

</body>

</html>
 <?php
//  echo "<script>alert('Outside IF')</script>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $user = $_POST["user-name"];
        $email = $_POST["e-mail"];
        $phoneno = $_POST["tel-no"];
        $password = $_POST["pass"];
        $pass = sha1($password);
        if (empty($name) || empty($user) || empty($phoneno) || empty($email) || empty($password) ){
        //     echo "Please ensure you've entered all fields";
        echo "<script>alert('Please ensure you've entered all fields')</script>";
          }
         else{
            echo "<script>alert('Updated form')</script>";
        $sql = "UPDATE user_table  SET Name ='$name',Username='$user',PhoneNo='$phoneno',Email='$email',Password='$pass' WHERE Username = '$session_username'";
        setData($sql);
         }
    }
    ?>
UserProfile.php
Displaying UserProfile.php.