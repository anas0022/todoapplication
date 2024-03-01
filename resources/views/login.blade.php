<!-- <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('CSS/login.css') }}">
</head>

<body>

<div class="allbody" style="width:100%; height:100% display:grid; justify-content:center; align-items:center;">
<div class="all">
    <div>
        @if($errors->any())
            <div>
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                @endforeach
            </div>
        @endif
        @if(Session()->has('error'))
            <div class="alert alert-danger">
                {{Session('error')}}
            </div>
        @endif
        @if(Session()->has('success'))
            <div class="alert alert-danger">
                {{Session('success')}}
            </div>
        @endif
    </div>
    <form action="{{route('login.post')}}" method="post" class="login">
        @csrf
        <div class="mb-1" >
            <label class="form-label" >Email address</label>
            <input type="email" class="form-control" name="email"  >
        </div>
        <div class="mb-1" >
            <label  class="form-label">Password</label>
            <input type="password" class="form-control" name="password" >
        </div>
        <button type="submit" class="  btn btn-primary"  >Submit</button>
    </form>
   
</div>
<div class="login-head" style="" >
<p style="text-align:center;"> Login</p> 
      
</div>
<div class="login-bottom"   >
 
<form action="register" style="">

<input type="submit" name="" id="lop" value="dont have a account? signup" style="">
</form>

      
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
 -->
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('CSS/login.css')}}">
</head>
<body>
  <section>
    @include('mode')
    @if(Session::has('error'))
    <div class="alert">{{ Session::get('error') }}</div>
@endif

    <form action="{{route('login.post')}}" method="post" class="sing">
      @csrf
      <div class="items">
        <div class="header">
          <p id="welcome">login</p>
        </div>
        <div class="input-body">
          <div class="inputs">
            
            <div class="lab">
              <label for="email" id="la2">Email</label>
            </div>
            <div class="in">
              <input type="email" name="email" id="email">
            </div>
            <div class="email-error">
            @error('email')
                        <span>*{{ $message }}</span>
                    @enderror
            </div>
            <div class="lab">
              <label for="password" id="la3">Password</label>
            </div>
            <div class="in">
              <input type="password" name="password" id="password">
            </div>
            <div class="password-error">
            @error('password')
                        <span>*{{ $message }}</span>
                    @enderror
            </div>
            
            <div id="f1">
              <button class="b1" type="submit">Login</button>
            </div></form>
            <div class="login-page">
            <form action="{{ route('register') }}" method="get" style="height:58%; display:flex; justify-content:center; align-items:center; width:25%; border-radius: .2vw; color:rgb(0, 110, 255);">
    <input type="submit" value="Dont have a account? sign up" id="register">
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
    var register =document.getElementById('register');

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
      
        label2.style.color = "white";
        label3.style.color = "white";
        
   
      email.style.background="rgb(31, 28, 28)";
      email.style.border="1px solid white";
      email.style.color=" white";
     password.style.background="rgb(31, 28, 28)";
      password.style.border="1px solid white";
      password.style.color=" white";
   
      register.style.color=" white";
        localStorage.setItem('darkModeEnabled', 'true');
    }

    function disableDarkMode() {
        body.style.background = "white";
        items.style.background = "white";
        items.style.boxShadow = "rgba(1, 2, 2, 0.336) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px";
        sun.style.display = "block";
        moon.style.display = "none";
        welcome.style.color = "black";
     
      
        label2.style.color = "black";
        label3.style.color = "black";
        
        
      email.style.background="white";
      email.style.border="1px solid black";
      email.style.color=" black";
      password.style.background="white";
      password.style.border="1px solid black";
      password.style.color=" black";
   
      register.style.color=" black";
        localStorage.setItem('darkModeEnabled', 'false');
    }
    
});
</script>
</body>
</html>
