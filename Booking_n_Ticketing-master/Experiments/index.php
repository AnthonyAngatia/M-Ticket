<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Experimental</title>
</head>

<body>

</body>
<script>
    var request = new XMLHttpRequest();
    //Open connection
    var method = 'GET';
    var url = "data.php";
    var asynchronus = true;

    request.open(method, url, asynchronus);
    request.send();
    //receiving response from data.php
    request.onreadystatechange = function() {
        if (request.status >= 200 && request.status < 400) {
            alert(this.responseText);
        }
    }
</script>

</html>