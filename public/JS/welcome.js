alert('dfsf')

document.addEventListener('DOMContentLoaded', function() {
    var body = document.body; // Select the body element directly
    var sun = document.getElementById('sun');
    var moon = document.getElementById('moon');
    var items = document.querySelector('.items');
    var welcome = document.getElementById('welcome');
    


    sun.onclick = function() {
        body.style.background = "rgb(31, 28, 28)";
        items.style.background = "rgb(31, 28, 28)";
        items.style.boxShadow = "rgba(1, 2, 2, 0.836) 0px 4px 8px 0px, rgba(14, 30, 37, 0.62) 0px 4px 24px 0px";
        sun.style.display = "none";
        moon.style.display = "block";
        welcome.style.color = "white";
      
    }
   moon.onclick = function() {
    body.style.background = "white";
    items.style.background = "white";
    items.style.boxShadow = "rgba(1, 2, 2, 0.336) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px";
       document.getElementById('sun').style.display="block";
       document.getElementById('moon').style.display="none";
       welcome.style.color = "black";
    }
});
