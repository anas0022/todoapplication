
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('CSS/home.css')}}">
</head>
<body>
    <section>
        <div class="heder">
            <div class="menu">
            <span class="glyphicon glyphicon-th" id="toggle"></span>
<div class="side-menu">
<div class="close">
<i class="fa fa-close" id="close"></i>
</div>
<div class="profile">
    <div class="plist" id="profile">
    <i class='fas fa-user-alt'></i>
    </div>

</div>
<div class="name" id="name">
<p>{{ session('name') }}</p>
</div>
<form action="{{ route('logout') }}" class="logout">
    <button type="" id="logout">Logout</button>
</form>
</div>
            </div>
            <div class="include">
            @include('mode')
            </div>
        </div>
        
        <div class="box">
        
           
        <form action="{{ route('edit.post') }}"  method="post" style="width:100%; height:100%;">
        @csrf
        <div class="date-input">
            <div class="date">
            <input type="date" id="date" name="date-edit" value="{{ $todo->date }}" ></div>
            </div>
            <div class="inputs">
<div class="nex">
                <h1 class="h1">List Your Tasks</h1>
                <div class="sub">
                
                <input type="text" id="tell" name="todo-edit" class="main-input" value="{{ $todo->todo_list }}">
</div>
               <div class="buttons">
                <button id="su-button" type="submit" >Submit</button>
               </div></div></form>
            </div>
        </div>

        <script>
document.addEventListener('DOMContentLoaded', function() {
    var body = document.body; 
    var sun = document.getElementById('sun');
    var moon = document.getElementById('moon');
    var toggle = document.getElementById('toggle');
    var menu = document.querySelector('.side-menu');
    var close = document.getElementById('close');
    var profile=document.getElementById('profile');
    var name=document.getElementById('name');
    var logout=document.querySelector('#logout');
    var date=document.getElementById('date');
    var inputbody=document.querySelector('.nex');
    var h1 =document.querySelector('.h1');
    var tell=document.getElementById('tell');
    var submit=document.getElementById('su-button');
    var task=document.getElementById('task');
    var allcard=document.querySelector('.card-items');
    var dates =document.querySelector('#dates');
    var Your=document.querySelector('#card-items');
    var image =document.querySelector('.image');

    toggle.onclick = function() {
        document.querySelector('.side-menu').style.transform = "translateX(0vh)";
    }
    close.onclick = function() {
        document.querySelector('.side-menu').style.transform = "translateX(-50vh)";
    }
  
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
        date.style.background = "rgb(31, 28, 28)";
        profile.style.color = "white";
        date.style.color = "white";
        name.style.color = "white";
        moon.style.display = "block";
        sun.style.display = "none";
        menu.style.background = "rgb(31, 28, 28)";
        logout.style.boxShadow = "rgba(1, 2, 2, 0.836) 0px 4px 8px 0px, rgba(14, 30, 37, 0.62) 0px 4px 24px 0px";
        date.style.boxShadow = "rgba(1, 2, 2, 0.836) 0px 4px 8px 0px, rgba(14, 30, 37, 0.62) 0px 4px 24px 0px";
        inputbody.style.background = "rgb(31, 28, 28)";
        inputbody.style.boxShadow = "rgba(1, 2, 2, 0.836) 0px 4px 8px 0px, rgba(14, 30, 37, 0.62) 0px 4px 24px 0px";
        h1.style.color = "white";
        tell.style.background = "rgb(31, 28, 28)";
        tell.style.border = "1px solid white";
        tell.style.color = "white";
        submit.style.boxShadow = "rgba(1, 2, 2, 0.836) 0px 4px 8px 0px, rgba(14, 30, 37, 0.62) 0px 4px 24px 0px";
        task.style.color = "white";
        allcard.style.boxShadow = "rgba(1, 2, 2, 0.836) 0px 4px 8px 0px, rgba(14, 30, 37, 0.62) 0px 4px 24px 0px";
        dates.style.boxShadow = "rgba(1, 2, 2, 0.836) 0px 4px 8px 0px, rgba(14, 30, 37, 0.62) 0px 4px 24px 0px";
        dates.style.color = "rgba(255, 255, 255, 0.178)";
        Your.style.color = "rgba(255, 255, 255, 0.178)";
        image.style.color = "rgba(255, 255, 255, 0.178)";
    }

    function disableDarkMode() {
        body.style.background = "white";
        profile.style.color = "black";
        moon.style.display = "none";
        sun.style.display = "block";
        menu.style.background = "white";
        name.style.color = "black";
        logout.style.boxShadow = "rgba(1, 2, 2, 0.336) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px";
        date.style.color = "black";
        date.style.background = "white";
        inputbody.style.background = "white";
        inputbody.style.boxShadow = "rgba(1, 2, 2, 0.336) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px";
        h1.style.color = "black";
        tell.style.background = "white";
        tell.style.border = "1px solid black";
        tell.style.color = "black";
        submit.style.boxShadow = "rgba(1, 2, 2, 0.336) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px";
        task.style.color = "black";
        allcard.style.boxShadow = "rgba(1, 2, 2, 0.336) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px";
        dates.style.boxShadow = "rgba(1, 2, 2, 0.336) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px";
        dates.style.color = "rgba(0, 0, 0, 0.315)";
        Your.style.color = "rgba(0, 0, 0, 0.315)";
        image.style.color = "rgba(0, 0, 0, 0.315)";
    }
});
</script>
          
        </body>
</html>