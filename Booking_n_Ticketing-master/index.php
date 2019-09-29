<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Experimental</title>


</head>

<body>
    <div class="test">

    </div>


</body>
<script>
    var test = document.querySelector('.test');
    const container = document.createElement('div');
    container.setAttribute('class', 'container');
    test.appendChild(container);

    var request = new XMLHttpRequest();
    //Open connection
    var method = 'GET';
    var url = "DatabaseFetch.php";
    var asynchronus = true;

    request.open(method, url, asynchronus);
    request.send();
    //receiving response from data.php
    request.onload = function() {
        //Converting JSON back to an array
        var data = JSON.parse(this.response);
        if (request.status >= 200 && request.status < 400) {
            //alert(this.responseText);

            // console.log(data);
            data.forEach(event => {
                console.log(event);
                var card = document.createElement('div');
                card.setAttribute('class', 'card');

                const h1 = document.createElement('h1');
                h1.textContent = event.Event_name;

                container.appendChild(card);
                card.appendChild(h1);

            });
        } else {
            console.log("Error loading the file");
        }
    }
</script>

</html>