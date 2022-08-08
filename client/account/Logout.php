<?php
// Start the session
    session_start();
   unset($_SESSION['username']);
   header('Location: /');

