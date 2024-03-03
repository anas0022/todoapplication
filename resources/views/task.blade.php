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

<div class="logout">
    <button id="tbu">Tasks</button>
</div>
<form action="{{ route('logout') }}" class="logout">
    <button type="" id="logout">Logout</button>
</form>

</div>

<div class="task-bar" > 
         <div class="span-taskbar">
         @foreach ($todos as $todo)
         <div class="task-items">
    <input type="checkbox" class="check" onclick="checkfunction(this)" data-id="{{ $todo->id }}" style="width:3vh; height:3vh;">
    <label>{{ $todo->date }}:{{ $todo->todo_list }}</label></div>
    <form class="delete2" id="delete2_{{ $todo->id }}" action="{{ route('todo.delete', ['id' => $todo->id]) }}" method="POST"
     style="position:relative;  display: none;  width: 100%; height: 8%; justify-content: center; align-items: center;" >
                    @csrf 
                    @method('DELETE')
                    <button type="submit"id="bu1" >Delete</button>
                </form>
    <br>
   
@endforeach

        </div> 
</div>

            </div>
            <div class="include">
            @include('mode')
            </div>
        </div>
        
        <div class="box">
        
           
        <form action="{{ route('home.post') }}" method="post" style="width:100%; height:100%;">
        @csrf
        <div class="date-input">
            <div class="date">
            <input type="date" id="date" name="date" value=""></div>
            </div>
            <div class="inputs">
<div class="nex">
                <h1 class="h1">List Your Tasks</h1>
                <div class="sub">
                
                <input type="text" id="tell" name="todo" class="main-input"></div>
               <div class="buttons">
                <button id="su-button" type="submit" >Submit</button>
               </div></div></form>
            </div>
        </div>
        <div class="task" >
<div class="task-head">
    <p id="task">Tasks</p>
</div>
@if (!$todos->isEmpty())
    <ul>
        @foreach ($todos as $todo)
            <div class="ite">
           
            <div class="items" >
            
          
            
                <p id="task-date"  >{{ $todo->date }} </p>
                <span id="appears_{{ $todo->id }}" class="appear" >
     
    <div class="img" style=" ">
        <img src="imoji.png" alt="" srcset="">
    </div>
    <div class="done-text">
        <p>Well Done</p>
    </div>
    
    
    </span><div class="else" style="position:relative;" > <p id="real" class="real">{{ $todo->todo_list }} </p>
            
                <div class="butt" style="">
   
                <form class="delete" action="{{ route('todo.delete', ['id' => $todo->id]) }}" method="POST" style="position:relative;"  >
                    @csrf 
                    @method('DELETE')
                    <button type="submit"id="bu1" >Delete</button>
                </form>
                <form class="edit" action="{{ route('edit', ['id' => $todo->id]) }}"  >
                    @csrf 
               
                    <button type="submit" style="width:80%;" id="bu2">Edit</button>
                </form></div>
            </div></div></div>
        @endforeach
       
    </ul>
    
   
</div>
@else
 @include('endif')
@endif 
</div>
</div>

        
    </div>
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
    var taskbu=document.getElementById('tbu');
    var taskbar= document.querySelector('.span-taskbar');
    var checkedCheckboxes = JSON.parse(localStorage.getItem('checkedCheckboxes')) || {};
    var checkboxes = document.querySelectorAll('.check');
    


checkboxes.forEach(function(checkbox) {
        var id = checkbox.getAttribute('data-id');
        if (checkedCheckboxes[id]) {
            checkbox.checked = true;
            var appear = document.getElementById('appears_' + id);
            appear.style.display = "block";
        }
    });

  
   checkboxes.forEach(function(checkbox) {
        var id = checkbox.getAttribute('data-id');
        if (checkedCheckboxes[id]) {
            checkbox.checked = true;
            var appear = document.getElementById('appears_' + id);
            var delete2 = document.getElementById('delete2_' + id);
            appear.style.display = "block";
            delete2.style.display = "flex"; // Show the delete2 button if the checkbox is checked
        }
    });

    // Function to handle checkbox click event
    function checkfunction(checkbox) {
        var id = checkbox.getAttribute('data-id');
        var appear = document.getElementById('appears_' + id);
        var delete2 = document.getElementById('delete2_' + id);

        if (checkbox.checked) {
            appear.style.display = "block";
            delete2.style.display = "flex";
            checkedCheckboxes[id] = true;
        } else {
            appear.style.display = "none";
            delete2.style.display = "none";
            checkedCheckboxes[id] = false;
        }
        // Store updated checkbox states in local storage
        localStorage.setItem('checkedCheckboxes', JSON.stringify(checkedCheckboxes));
    }

    // Attach checkfunction to checkbox click event
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('click', function() {
            checkfunction(this);
        });
    });



    var translateYValue = 0; // Initial translateY value

taskbu.onclick = function() {
    if (translateYValue === 0) {
        taskbar.classList.add('yourClassName');
        taskbar.style.transform = "translatex(-150vh)";
        translateYValue = -140;
    } else {
        taskbar.classList.remove('yourClassName');
        taskbar.style.transform = "translateX(0vh)";
        translateYValue = 0;
    }
}



    toggle.onclick = function() {
        document.querySelector('.side-menu').style.transform = "translateX(0vh)";
    }
    close.onclick = function() {
        document.querySelector('.side-menu').style.transform = "translateX(-50vh)";
        taskbar.style.transform = "translateX(-150vh)";
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
function checkfunction(checkbox) {
    var id = checkbox.getAttribute('data-id'); // Get the data-id attribute value
    var appear = document.getElementById('appears_' + id); // Select the corresponding 'appears' div
    if (checkbox.checked) {
        appear.style.display = "block";
    } else {
        appear.style.display = "none";
    }
}



</script>


</body>
</html>