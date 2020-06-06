<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}



?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="index.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>log</title>
  </head>
  <body style="background-color: rgb(140, 204, 140);">
  
  
  <nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" style="color:white"> <?php echo $_SESSION['username']?></a>
  <form class="form-inline">
    <button type="button" class="btn btn-dark"><a class="nav-link" href="friends.php">Friends</a></button>
    <button type="button" class="btn btn-dark"><a class="nav-link" href="logout.php">Logout</a></button>
  </form>
  </nav>



<div class="container mt-4">
<h3><?php echo ("Welcome ". $_SESSION['username'])?></h3>
<hr>







<div class="container">
  <div class="anyClass">

  </div>
</div>

<br>
<br>

<input type="text" class="form-control" name="usermsg" id="usermsg" style="max-width:50%;font-size:small" placeholder="Add Message">
<button type="button" class="btn btn-success" style="margin-top:1%" name="submitmsg" id="submitmsg">POST</button>
  








</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript">

    setInterval(runFunction,1000);
    function runFunction()
    {
      $.post("htcont.php",{username:'<?php echo $_SESSION['username']?>'},
      function(data,status)
      {document.getElementsByClassName('anyClass')[0].innerHTML=data;}
      )
    }

    var input = document.getElementById("usermsg");

    // Execute a function when the user releases a key on the keyboard
    input.addEventListener("keyup", function(event) {
      // Number 13 is the "Enter" key on the keyboard
      if (event.keyCode === 13) {
      // Cancel the default action, if needed
      event.preventDefault();
      // Trigger the button element with a click
      document.getElementById("submitmsg").click();
    }
    })


      $("#submitmsg").click(function(){
      var clientmsg=$("#usermsg").val();
      $.post("postmsg.php",{text: clientmsg,username:'<?php echo $_SESSION['username']?>'},
      function(data,status)
      {document.getElementsByClassName('anyClass')[0].innerHTML=data;});
      $("#usermsg").val("");
      return false; 
    });
    
    window.setInterval(function() {
    var elem = document.getElementByClassName('anyClass');
    elem.scrollBottom = elem.scrollHeight;
    }, 5000);
    
    </script>


  </body>
</html>