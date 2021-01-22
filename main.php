<!DOCTYPE html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags always come first -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <?php
  include('connection.php');
  session_start(); 
  ?>

  <!-- build:css css/main.css -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
  <link href="https://fonts.googleapis.com/css2?family=Grenze+Gotisch&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fondamento&family=Grenze+Gotisch&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="css/home.css" rel="stylesheet">
  <!-- endbuild -->
    <body style="background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80'); background-repeat: no-repeat;background-size:cover;" >
    <nav class="navbar bg-dark navbar-expand-sm fixed-top"> 
      <div class="container-fluid">
       <a class="navbar-brand" href="#"><img src="img/logo.svg" height="60" width="60"></a> 
       <a class="navbar-brand" href="#">To-Do-Ist</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="Navbar">
        <ul class="navbar-nav ml-auto">
          <li>
            <button class="btn btn-md" id="logOutButton" >
              <span class="fa fa-sign-in"></span><a href="index.html"> Logout</a>
            </button>           
          </li>
        </ul>      
      </div>   
    </div>       
  </nav>     


  <div class="container" style="margin-top: 100px">
    <div class="row">
      <div class="col-md-12">
        <h2>REMINDERS</h2>
        <form method="post" action="reminder.php">
          <input class="col-sm-6 form-control" type="text" name="Reminder" placeholder="ADD REMINDER">
          <br><br>
          <input class="col-md-1 col-sm-2 form-control" type="text1" name="DD" placeholder="DD">
          <input class="col-md-1 col-sm-2 form-control" type="text1" name="MM" placeholder="MM">
          <input class="col-md-1 col-sm-2 form-control" type="text1" name="YY" placeholder="YY">
          <button class="btn btn-default btn-sm" value="ADD" name="query"><i class="fa fa-plus-circle fa-3x" aria-hidden="true"></i></button>
          <!-- <input type="submit" value="ADD" name="query">-->
        </form>
        <br>
        <div><h2 class="pull-left"><i class="fa fa-clock-o" aria-hidden="true"></i>  REMINDER-LIST</h2>
          <table class="table table-hover">
            <therad><th><h3>Reminder</h3></th><th><h3>DD-MM-YY</h3></th><th></th></therad>
            <tbody>
              <?php
              $id=$_SESSION['id']; 
              $query = mysqli_query($con, "SELECT * FROM reminders where uid=$id ORDER BY yy,mm,dd")
              or die (mysqli_error($con));

              while ($row = mysqli_fetch_array($query)) {
                ?>
                <tr>
                  <td><i class="fa fa-arrow-circle-o-right fa-2x" aria-hidden="true">  <?= htmlspecialchars($row['reminder']) ?></td></i>   
                  <td>   <h4><?= htmlspecialchars($row['dd']) ?>-<?= htmlspecialchars($row['mm']) ?>-<?= htmlspecialchars($row['yy']) ?></h4></td>
                  <td>
                    <form method="POST" action="reminder.php">
                      <input type="hidden" name="Reminder" value="<?= $row['reminder'] ?>">
                      <input type="hidden" name="DD" value="<?= $row['dd'] ?>">
                      <input type="hidden" name="MM" value="<?= $row['mm'] ?>">
                      <input type="hidden" name="YY" value="<?= $row['yy'] ?>">
                      <button class="btn btn-default btn-sm float-right" value="REMOVE" name="query"><i class="fa fa-times fa-2x" aria-hidden="true"></i></button>

                    </form>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table></div>
          
        </div> 


        <div class="container" style="margin-top: 100px">
          <div class="row">
            <div class="col-md-5">
              <h2>TO-DO LIST</h2>
              <form method="post" action="todo.php">
                <input type="text" name="task" placeholder="ADD YOUR TASK HERE">

                <button class="btn btn-default btn-sm float-right" value="ADD" name="query"><i class="fa fa-plus-circle fa-3x" aria-hidden="true"></i></button>
                <!-- <input type="submit" value="ADD" name="query">-->
              </form>
              <br><br><br><br>

              <h2><i class="fa fa-list" aria-hidden="true"></i>   Current Todos</h2>
              <table class="table table-hover">
                <therad><th>Task</th><th></th></therad>
                <tbody>
                  <?php
                  $id=$_SESSION['id']; 
                  $query = mysqli_query($con, "SELECT * FROM todos where uid=$id")
                  or die (mysqli_error($con));

                  while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                      <td><i class="fa fa-chevron-right" aria-hidden="true"></i>   <?= htmlspecialchars($row['tasks']) ?></td>
                      <td>
                        <form method="POST" action="todo.php">
                          <input type="hidden" name="task" value="<?= $row['tasks'] ?>">
                          <button class="btn btn-default btn-sm float-right" value="REMOVE" name="query"><i class="fa fa-times fa-2x" aria-hidden="true"></i></i></button>

                        </form>
                      </td>
                    </tr>
                    <?php
                  }
                  ?>
                </tbody>
              </table>
            </div> 


            <div class="col-md-7">
              <h2>NOTES</h2>
              <form class="new-note" action="notes.php" method="post">
                <input type="text" name="title" placeholder="Note title" autocomplete="off" value="">
                <textarea name="note" cols="80%" rows="8" placeholder="Note Description"></textarea>
                <button class="btn btn-default btn-sm btn1" value="ADD" name="query">ADD</button>
              </form>
              <div class="col-md-12">
                <?php 
                $id=$_SESSION['id']; 
                $query = mysqli_query($con, "SELECT * FROM notes where uid=$id")
                or die (mysqli_error($con));

                while ($row = mysqli_fetch_array($query)) { ?>
                  <div class="note">
                    <div class="title">
                      <i class="fa fa-sticky-note" aria-hidden="true"></i>
                      <a href="?id=<?php echo $row['id'] ?>">
                        <?php echo $row['title'] ?>
                      </a>
                    </div>
                    <div>
                      <?php echo $row['description'] ?>
                    </div>
                    <form action="notes.php" method="post">

                      <input type="hidden" name="title" value="<?= $row['title'] ?>">
                      <input type="hidden" name="note" value="<?= $row['description'] ?>">
                      <button class="btn btn-default btn-sm float-right" value="REMOVE" name="query"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></button>
                    </form>
                    <button class="btn btn-default btn-sm float-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
                    </button>  
                  </div>
                <?php }?>
              </div>
            </div>
          </div>
        </div>


        <!-- Modal for Notes Updation -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">    
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">NOTES UPDATE</h4>
              </div>
              <div class="modal-body">

                <form method="post" action="notes.php">
                 <input type="text" name="title" placeholder="Enter note title which is to be updated" autocomplete="off" value="">
                 <br><br>
                 <textarea name="note" cols="50  " rows="8" placeholder="Note Description"></textarea>

                 <button class="btn btn-default btn-sm" value="EDIT" name="query">UPDATE</button>
               </form>
             </div>

           </div>

         </div>
       </div>




       <!-- build:js js/main.js -->
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
       <script src="js/scripts.js"></script>
       <!-- endbuild -->


     </body>
     </html>
