<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE HTML>

<html>
  <head>
    <link href="http://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/fonts.css" rel="stylesheet" type="text/css" media="all" />

    <style>
      body {
        height: auto;
        text-align: center;
        background: #1DA249;
      }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 100px;
        border-radius: 10px;
        display: inline-block;
        margin: 0 auto;
      }   
    </style>
    
  </head>

    <body>

      <div id="wrapper">

          <img src="ico/tahniah.svg" style="display:block; width: 50%; margin-left: auto; margin-right: auto; margin-top: 5%; border-radius: 10px;"> 

          <a onClick="location.href='utamaPemohon.php'" class="btn btn-berjaya">Kembali</a>

    </div>


  </body>

</html>