<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
   
    <link rel="stylesheet" href="{{asset('CSS/welcome.css')}}">
</head>
<body class="b">
    <section>
      @include('mode')
    <div class="box">
        <div class="image">
            <img src="favicon.ico" alt="" srcset="" >
        </div>
        <div class="singup-login">
<div class="items">
<p id="welcome">welcome to To Do</p>
<div class="buttons">
    <form action="register" id="f1">
    <button class="b1">Singup</button></form>
    <form action="login" id="f2">
    <button class="b2">Login</button></form>
</div>
</div>
        </div>
    </div>
    </section>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    var body = document.body; 
    var sun = document.getElementById('sun');
    var moon = document.getElementById('moon');
    var items = document.querySelector('.items');
    var welcome = document.getElementById('welcome');

    // Check if the dark mode is enabled in local storage
    var darkModeEnabled = localStorage.getItem('darkModeEnabled');
    if (darkModeEnabled === 'true') {
        enableDarkMode();
    }

    sun.onclick = function() {
        enableDarkMode();
    }

    moon.onclick = function() {
        disableDarkMode();
    }

    function enableDarkMode() {
        body.style.background = "rgb(31, 28, 28)";
        items.style.background = "rgb(31, 28, 28)";
        items.style.boxShadow = "rgba(1, 2, 2, 0.836) 0px 4px 8px 0px, rgba(14, 30, 37, 0.62) 0px 4px 24px 0px";
        sun.style.display = "none";
        moon.style.display = "block";
        welcome.style.color = "white";

        // Store the state in local storage
        localStorage.setItem('darkModeEnabled', 'true');
    }

    function disableDarkMode() {
        body.style.background = "white";
        items.style.background = "white";
        items.style.boxShadow = "rgba(1, 2, 2, 0.336) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px";
        sun.style.display = "block";
        moon.style.display = "none";
        welcome.style.color = "black";

        // Store the state in local storage
        localStorage.setItem('darkModeEnabled', 'false');
    }
});
</script>

</body>
</html>