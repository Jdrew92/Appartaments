<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: ../views/html/login-page.php");
   }
?>