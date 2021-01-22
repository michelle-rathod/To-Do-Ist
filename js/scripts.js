$(document).ready(function(){

  var a=0;

    //login
    $("#loginButton").click(function(){
      $('#loginModal').modal('show')
    });

    //signup
    $("#signupButton").click(function(){
      $('#signupModal').modal('show')
    });

    $(".signup").click(function(){
      $('#loginModal').modal('hide')
      $('#signupModal').modal('show')  
    });

    $(".login").click(function(){
      $('#signupModal').modal('hide')
      $('#loginModal').modal('show')

    });

    $(".get-started").click(function(){
      $('#loginModal').modal('show') 
    });

    $(".pwforgot").click(function(){

      document.getElementById("demo").innerHTML = "HINT:";
    });


    //add to to-do list
   // Create a "close" button and append it to each list item
   var myNodelist = document.getElementsByTagName("L");
   var i;
   for (i = 0; i < myNodelist.length; i++) {
    var span = document.createElement("SPAN");
    var txt = document.createTextNode("\u00D7");
    span.className = "close";
    span.appendChild(txt);
    myNodelist[i].appendChild(span);
  }

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
  }
}, false);

// Create a new list item when clicking on the "Add" button
function newElement() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}}
);


//login and register validation
function val_login()  
{  
  console.log('in validation');
var id = document.getElementById("f1").Username.value;
var ps = document.getElementById("f1").Password.value;
  if(id.length=="" && ps.length=="") {  
    alert("User Name and Password fields are empty");  
    return false;  
  }  
  else  
  {  
    if(id.length=="") {  
      alert("User Name is empty");  
      return false;  
    }   
    if (ps.length=="") {  
      alert("Password field is empty");  
      return false;  
    } 
    if (ps.length<3) {  
      alert("Password should be atleast 6 characters long");  
      return false;  
    } 

  }                             
} 
function val_signup()  
{  
  console.log('in validation');
var id = document.getElementById("f2").Username.value;
var ps = document.getElementById("f2").Password.value;
  if(id.length=="" && ps.length=="") {  
    alert("User Name and Password fields are empty");  
    return false;  
  }  
  else  
  {  
    if(id.length=="") {  
      alert("User Name is empty");  
      return false;  
    }   
    if (ps.length=="") {  
      alert("Password field is empty");  
      return false;  
    } 
    if (ps.length<3) {  
      alert("Password should be atleast 6 characters long");  
      return false;  
    } 

  }                             
} 