<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('CSS/register.css')}}">
</head>
<body>
<div class="mode">
        <i class="fa-solid fa-sun" id="sun"></i>
<i class="fa-solid fa-moon" id="moon"></i></div>
  <section>
  
   

    <form action="{{route('register.post')}}" method="post" class="sing">
      @csrf
      <div class="items">
        <div class="header">
          <p id="welcome">Register</p>
        </div>
        <div class="input-body">
          <div class="inputs">
            <div class="lab">
              <label for="name" id="la1">Name</label>
            </div>
            <div class="in">
              <input type="text" name="name" id="name">
            </div>
            <div class="name-error">
              @if($errors->has('name'))
                <span >*{{$errors->first('name')}}</span>
              @endif
            </div>
            <div class="lab">
              <label for="email" id="la2">Email</label>
            </div>
            <div class="in">
              <input type="email" name="email" id="email">
            </div>
            <div class="email-error">
              @if($errors->has('email'))
                <span >*{{$errors->first('email')}}</span>
              @endif
            </div>
            <div class="lab">
              <label for="password" id="la3">Password</label>
            </div>
            <div class="in">
              <input type="password" name="password" id="password">
            </div>
            <div class="password-error">
              @if($errors->has('password'))
                <span>*{{$errors->first('password')}}</span>
              @endif
            </div>
            <div class="lab">
              <label for="confirm" id="la4">Confirm Password</label>
            </div>
            <div class="in">
              <input type="password" name="confirm" id="confirm">
            </div>
            <div class="confirm-error">
              @if($errors->has('confirm'))
                <span >*{{$errors->first('confirm')}}</span>
              @endif
            </div>
            <div id="f1">
              <button class="b1" type="submit">Signup</button>
            </div></form>
            <div class="login-page">
            <form action="{{ route('login') }}" method="get" style="height:58%; display:flex; justify-content:center; align-items:center; width:25%; border-radius: .2vw; color:rgb(0, 110, 255);">
    <input type="submit" value="Already have an account? Login" id="login">
</form>

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
    var label1= document.getElementById('la1');
    var label2= document.getElementById('la2');
    var label3= document.getElementById('la3');
    var label4= document.getElementById('la4');
    var name =document.getElementById('name');
    var email =document.getElementById('email');
    var password =document.getElementById('password');
    var confirm =document.getElementById('confirm');
    var login =document.getElementById('login');

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
        label1.style.color = "white";
        label2.style.color = "white";
        label3.style.color = "white";
        label4.style.color = "white";
      name.style.background="rgb(31, 28, 28)";
      name.style.border="1px solid white";
      name.style.color=" white";
      email.style.background="rgb(31, 28, 28)";
      email.style.border="1px solid white";
      email.style.color=" white";
     password.style.background="rgb(31, 28, 28)";
      password.style.border="1px solid white";
      password.style.color=" white";
    confirm.style.background="rgb(31, 28, 28)";
      confirm.style.border="1px solid white";
      confirm.style.color=" white";
      login.style.color=" white";
        localStorage.setItem('darkModeEnabled', 'true');
    }

    function disableDarkMode() {
        body.style.background = "white";
        items.style.background = "white";
        items.style.boxShadow = "rgba(1, 2, 2, 0.336) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px";
        sun.style.display = "block";
        moon.style.display = "none";
        welcome.style.color = "black";
     
        label1.style.color = "black";
        label2.style.color = "black";
        label3.style.color = "black";
        label4.style.color = "black";
        name.style.background="white";
      name.style.border="1px solid black";
      name.style.color=" black";
      email.style.background="white";
      email.style.border="1px solid black";
      email.style.color=" black";
      password.style.background="white";
      password.style.border="1px solid black";
      password.style.color=" black";
      confirm.style.background="white";
      confirm.style.border="1px solid black";
      confirm.style.color=" black";
      login.style.color=" black";
        localStorage.setItem('darkModeEnabled', 'false');
    }
    
});
</script>
</body>
</html>
